<?php

use Illuminate\Support\Str;


if (!function_exists("paginationSize")) {
    function paginationSize($per_page = 5): int
    {
        return $per_page;
    }
}


if (!function_exists("generateComplexPassword")) {
    function generateComplexPassword($firstName): string
    {
        $currentTime  = now()->format('YmdHis');
        $randomString = Str::random(4);
        $specialCharacters = '!@#$%^&*()_+-=[]{}|;:,.<>?';
        $specialChar = $specialCharacters[random_int(0, strlen($specialCharacters) - 1)];
        $password    = $firstName . $currentTime . $randomString . $specialChar;
        return str_shuffle($password);
    }
}

if (!function_exists("uploadSpace")) {
    function uploadSpace(string $space = 'images'): string
    {
        return config('settings.upload_space') . '/'. $space;
    }
}
