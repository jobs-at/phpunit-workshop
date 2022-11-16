<?php

namespace App\Services;

interface TwitterService
{
    public function send(string $message);
}
