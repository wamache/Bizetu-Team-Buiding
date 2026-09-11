<?php

namespace App\Models\Translations;

use A17\Twill\Models\Model;
use App\Models\Setting;

class SettingTranslation extends Model
{
    protected $baseModuleModel = Setting::class;
}
