<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;

class SliderController extends BaseModuleController
{
    protected $moduleName = 'sliders';

    protected $indexColumns = [
        'title' => ['title' => 'Title', 'sort' => true],
    ];

    protected $indexOptions = [
        'reorder' => true,
        'publish' => true,
    ];
}
