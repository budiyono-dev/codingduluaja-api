<?php

namespace App\Helper;

use App\Models\Configuration;
use Exception;

class ConfigUtils {

    public static function getSeederUserApiQty(){
        $qty = 0;
        $config = Configuration::where('group', 'seeder')->where('key', 'user.api.qty')->first();

        if(ConfigUtils::validateConfig($config)){
            $qty = $config['value'];
        } else {
            $qty = config('cda.seeder_user_api_qty');
        }
        return $qty;
    }

    private static function validateConfig(Configuration|null $config) {
        if (!is_null($config) && !is_null($config['value']) &&  !$config['value'] !== '') {
            return true;
        }
        return false;
    }

}
