<?php

namespace App\Repositories;

use A17\Twill\Repositories\ModuleRepository;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use App\Models\PlatformSetting;

class PlatformSettingRepository extends ModuleRepository
{
    use HandleMedias, HandleFiles, HandleSlugs, HandleRevisions;

    public function __construct(PlatformSetting $model)
    {
        $this->model = $model;
    }
}
