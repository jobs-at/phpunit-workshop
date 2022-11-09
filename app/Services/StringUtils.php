<?php

namespace App\Services;

use Illuminate\Support\Str;

class StringUtils
{

    public static function isPalindrome(string $str): bool
    {
        return Str::lower(Str::reverse($str))=== Str::lower($str);
    }

    public static function capitalize(string $str): string
    {
        return ucwords($str);
    }

    public static function addSpaceAfterEveryLetter(string $str): string
    {
        return rtrim(chunk_split($str, 1, ' '));
    }

    public static function removeGivenLetter(string $str, string $letter): string
    {
        return str_replace($letter, '', Str::lower($str));
    }

    public static function capitalizeFirstLetter(string $word): string
    {
        return Str::ucfirst($word);
    }

    public static function capatilizeWords(string $str): string
    {
        $result = [];
        $words = explode(' ', $str);
        foreach ($words as $word) {
             $result[] = Str::ucfirst($word);
        }
        return implode(' ', $result);
    }

    public static function addSpaces(string $str): string
    {
        return implode(' ', str_split($str));
    }

    public static function removeLetterFromString(string $str, string $letter): string
    {
        return Str::remove($letter, $str);
    }
}
