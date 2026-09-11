<?php

namespace App\Repositories;

use A17\Twill\Repositories\ModuleRepository;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use App\Models\Page;

class PageRepository extends ModuleRepository
{
    use HandleMedias, HandleBlocks, HandleSlugs, HandleRevisions, HandleFiles;

    public function __construct(Page $model)
    {
        $this->model = $model;
    }
}
