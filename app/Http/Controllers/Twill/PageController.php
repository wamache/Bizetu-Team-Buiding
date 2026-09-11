<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;

class PageController extends BaseModuleController
{
    protected $moduleName = 'pages';

    protected $defaultOrders = [
        'position' => 'asc',
    ];

    protected function setUpController(): void
    {
        $this->setPermalinkBase('');
    }

    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();

        $table->add(
            Text::make()
                ->field('header_title')
                ->title('Header Title')
        );

        $table->add(
            Text::make()
                ->field('key')
                ->title('Key')
        );

        $table->add(
            Text::make()
                ->field('position')
                ->title('Position')
        );

        return $table;
    }
}
