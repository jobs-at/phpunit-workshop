<?php

namespace App\Services;

use Nette\NotImplementedException;

class RealTwitter implements TwitterService
{
    public function send(string $message)
    {
        throw new NotImplementedException();
    }
}
