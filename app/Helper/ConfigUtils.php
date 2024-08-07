<?php

namespace App\Helper;

use App\Models\Configuration;

class ConfigUtils
{
    public static function getSeederUserApiQty()
    {
        $qty = 0;
        $config = Configuration::where('group', 'seeder')->where('key', 'user.api.qty')->first();

        if (ConfigUtils::validateConfig($config)) {
            $qty = $config['value'];
        } else {
            $qty = config('cda.seeder_user_api_qty');
        }

        return $qty;
    }

    public static function getPageSize()
    {
        $qty = 0;
        $config = Configuration::where('group', 'pagintaion')->where('key', 'page.size')->first();

        if (ConfigUtils::validateConfig($config)) {
            $qty = $config['value'];
        } else {
            $qty = config('app.page_size');
        }

        return $qty;
    }

    private static function validateConfig(?Configuration $config)
    {
        if (! is_null($config) && ! is_null($config['value']) && ! $config['value'] !== '') {
            return true;
        }

        return false;
    }
}
