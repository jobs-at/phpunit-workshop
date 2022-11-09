<?php

namespace App\Services;

use Illuminate\Support\Str;

class StringUtils
{
    public static function isPalindrome(string $str): bool
    {
        return Str::lower(Str::reverse($str))=== Str::lower($str);
    }
}
