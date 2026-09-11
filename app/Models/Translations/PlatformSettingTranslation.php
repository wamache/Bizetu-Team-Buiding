<?php

namespace App\Models\Translations;

use A17\Twill\Models\Model;
use App\Models\PlatformSetting;

class PlatformSettingTranslation extends Model
{
    protected $baseModuleModel = PlatformSetting::class;
}
