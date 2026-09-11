<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PlatformSetting;
use App\Services\MenuCacheService;

class LandingController extends Controller
{
    public function __invoke()
    {
        $page = Page::published()
            ->whereHas('slugs', function ($query) {
                $query->where('slug', 'home');
            })
            ->first();

        if (!$page) {
            $page = Page::published()
                ->where('slug', 'home')
                ->first();
        }

        return view('site.landing', [
            'headerMenu' => MenuCacheService::tree('header'),
            'footerMenu' => MenuCacheService::tree('footer'),
            'page' => $page,
            'settings' => PlatformSetting::published()->first(),
        ]);
    }
}
