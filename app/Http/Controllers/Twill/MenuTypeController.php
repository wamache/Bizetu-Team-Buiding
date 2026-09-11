<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;

class MenuTypeController extends BaseModuleController
{
    protected $moduleName = 'menuTypes';

    protected $indexColumns = [
        'title' => ['title' => 'Title', 'sort' => true],
        'key'   => ['title' => 'Key', 'sort' => false],
    ];
}
