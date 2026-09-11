<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Slider;
use App\Models\Menu;
use App\Models\MenuType;
use App\Models\PlatformSetting;

class FrontendController extends Controller
{
    /**
     * Homepage
     */
    public function home()
    {
        $sliders = Slider::published()
            ->orderBy('position')
            ->get();

        $settings = PlatformSetting::published()->first();

        return view('site.home', [
            'sliders' => $sliders,
            'settings' => $settings,
            'mainMenu' => $this->menuFor('main_menu'),
            'footerMenu' => $this->menuFor('footer_menu'),
        ]);
    }

    /**
     * CMS page
     */
    public function show($slug)
    {
        $page = Page::published()
            ->whereHas('slugs', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->first();

        /*
         * Fallback for projects where the slug is stored
         * directly on the pages table.
         */
        if (!$page) {
            $page = Page::published()
                ->where('slug', $slug)
                ->firstOrFail();
        }

        return view('site.page', [
            'page' => $page,
            'settings' => PlatformSetting::published()->first(),
            'mainMenu' => $this->menuFor('main_menu'),
            'footerMenu' => $this->menuFor('footer_menu'),
        ]);
    }

    /**
     * Get menu items for a specific menu type.
     */
    private function menuFor(string $key)
    {
        $type = MenuType::published()
            ->where('key', $key)
            ->first();

        if (!$type) {
            return collect();
        }

        return Menu::published()
            ->where('menu_type_id', $type->id)
            ->orderBy('position')
            ->with('page')
            ->get();
    }
}
