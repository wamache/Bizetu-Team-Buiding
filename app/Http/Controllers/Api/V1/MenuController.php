<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\MenuTypeResource;
use App\Models\MenuType;
use App\Services\MenuCacheService;
use Illuminate\Http\JsonResponse;

class MenuController extends Controller
{
    /**
     * GET /api/v1/menus/{slug}
     * Returns the full, published, visibility-filtered tree for one
     * menu type (e.g. "header", "footer"), cached per locale/auth state.
     */
    public function show(string $slug): JsonResponse
    {
        $menuType = MenuType::published()
            ->whereHas('slugs', fn ($q) => $q->where('slug', $slug))
            ->firstOrFail();

        $items = MenuCacheService::tree($slug);

        return (new MenuTypeResource([
            'slug' => $slug,
            'layout' => $menuType->layout,
            'columns_count' => $menuType->columns_count,
            'items' => $items,
        ]))->response();
    }
}
