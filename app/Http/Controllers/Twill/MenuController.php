<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;

class MenuController extends BaseModuleController
{
    protected $moduleName = 'menus';

    protected $indexColumns = [
        'key' => [
            'title' => 'Key',
            'sort' => true,
        ],

        'menu_type_id' => [
            'title' => 'Menu Type',
            'sort' => true,
        ],
    ];

    protected $indexOptions = [
        'reorder' => true,
    ];
}
