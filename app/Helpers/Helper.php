<?php

namespace App\Helpers;

class Helper
{
    static $usdToVndRate = 24000;
    public static function convertVndToUsd($vnd){
        return $vnd / self::$usdToVndRate;
    }
}
