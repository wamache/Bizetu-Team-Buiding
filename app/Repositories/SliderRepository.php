<?php

namespace App\Repositories;

use A17\Twill\Repositories\ModuleRepository;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use App\Models\Slider;

class SliderRepository extends ModuleRepository
{
    use HandleMedias, HandleRevisions;

    public function __construct(Slider $model)
    {
        $this->model = $model;
    }
}
