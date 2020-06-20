<?php // Code within app\Helpers\Helper.php

use Modules\Setting\Entities\Setting;


function getSettingValue(string $settingKey)
{

    $setting = Setting::where('key',$settingKey)->first();

    if ($setting) {
        return $setting->value;
    } else {
        return null;
    }
}
