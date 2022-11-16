<?php

namespace App\Facades;

use App\Services\TwitterFake;
use Illuminate\Support\Facades\Facade;

class Twitter extends Facade
{
    public static function fake(): TwitterFake
    {
        static::swap($fake = new TwitterFake);

        return $fake;
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'twitter';
    }
}
