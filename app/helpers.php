<?php

if (!function_exists('theme_assets')) {
    function theme_assets($uri)
    {
        return url('theme/v1/' . $uri);
    }
}

if (!function_exists('l')) {
    function l()
    {
        return config("app.locale_prefix") == ''
            ? 'en'
            : config("app.locale_prefix");
    }
}

if (!function_exists('u')) {
    function u($l)
    {
        return Storage::disk('public')->url($l);
    }
}

if (!function_exists('d')) {
    function d($value)
    {
        return Carbon\Carbon::parse($value)->format('d-m-Y');
    }
}

if (!function_exists('t')) {
    function t($value)
    {
        return Carbon\Carbon::parse($value)->format('H:i');
    }
}

if (!function_exists('ratings')) {
    function ratings($rating_avg)
    {
        for ($i = 0; $i < $rating_avg; $i++) {
            echo '<i class="fas fa-star checked"></i>';
        }
        for ($i = $rating_avg; $i < 5; $i++) {
            echo '<i class="fal fa-star"></i>';
        }
    }
}
