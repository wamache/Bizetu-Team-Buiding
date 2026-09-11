<?php

namespace App\Services;

use App\Models\Menu;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class MenuCacheService
{
    private const TTL = 3600;

    public static function tree(?string $menuTypeSlug): Collection
    {
        if (! $menuTypeSlug) {
            return collect();
        }

        /*
         * Your current database uses menu_types.key,
         * not menu_types.slug.
         */
        $menuTypeId = \App\Models\MenuType::query()
            ->where('key', $menuTypeSlug)
            ->where('published', true)
            ->value('id');

        if (! $menuTypeId) {
            return collect();
        }

        /*
         * Cache IDs rather than Eloquent models.
         * This avoids __PHP_Incomplete_Class problems.
         */
        $cacheKey = 'menus:tree:' . $menuTypeSlug . ':' . (Auth::id() ?? 'guest');

        $ids = Cache::remember(
            $cacheKey,
            self::TTL,
            function () use ($menuTypeId) {
                return Menu::query()
                    ->published()
                    ->visibleTo(Auth::user())
                    ->where('menu_type_id', $menuTypeId)
                    ->orderBy('position')
                    ->pluck('id')
                    ->values()
                    ->all();
            }
        );

        if (empty($ids)) {
            return collect();
        }

        /*
         * Retrieve fresh models.
         */
        return Menu::query()
            ->published()
            ->visibleTo(Auth::user())
            ->whereIn('id', $ids)
            ->orderBy('position')
            ->get();
    }

    public static function forget(?string $menuTypeSlug): void
    {
        if (! $menuTypeSlug) {
            return;
        }

        $cacheKey = 'menus:tree:' . $menuTypeSlug . ':' . (Auth::id() ?? 'guest');

        Cache::forget($cacheKey);
    }
}
