<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 7/26/17
 * Time: 5:51 PM
 */
if (!function_exists('is_debug')) {
    function is_debug()
    {
        return config('app.debug');
    }
}

if (!function_exists('sql_debug')) {
    function sql_debug(callable $function)
    {
        \DB::enableQueryLog();
        $function();
        dd(\DB::getQueryLog());
    }
}

if (!function_exists('user')) {
    function user(string $guard = null)
    {
        return auth($guard)->user();
    }
}