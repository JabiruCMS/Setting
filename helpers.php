<?php

use Illuminate\Support\Facades\Cache;

if (! function_exists('setting')) {
    function setting($name, $locale = null, $default = null)
    {
        return Cache::driver('array')
            ->remember('setting_' . sha1($name . (string)$locale), 60, function () use ($name, $locale, $default) {
                return app('setting.settings')->get($name, $locale, $default);
            });
    }
}
