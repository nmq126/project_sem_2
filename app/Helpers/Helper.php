<?php

namespace App\Helpers;

class Helper
{
    static $usdToVndRate = 24000;
    public static  function convertVndToUsd($vnd){
        return number_format((float) $vnd / Helper::$usdToVndRate,2,'.','' );
    }
    public static function formatVnd($vnd){
        return number_format($vnd, 0);
    }
}
