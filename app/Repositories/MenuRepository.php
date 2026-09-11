<?php
namespace App\Repositories;

use A17\Twill\Repositories\ModuleRepository;
use A17\Twill\Models\Contracts\TwillModelContract;
use App\Models\Menu;
use App\Models\MenuType;
use App\Models\Page;

class MenuRepository extends ModuleRepository
{
    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    public function getFormFields(TwillModelContract $object): array
    {
        $fields = parent::getFormFields($object);

        $fields['menuTypes'] = MenuType::published()
            ->orderBy('position')
            ->pluck('title', 'id')
            ->toArray();

        $fields['pages'] = Page::published()
            ->orderBy('title')
            ->pluck('title', 'id')
            ->toArray();

        return $fields;
    }
}
