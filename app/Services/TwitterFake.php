<?php

namespace App\Services;

use PHPUnit\Framework\Assert;

class TwitterFake implements TwitterService
{
    private array $tweets = [];

    public function send(string $message)
    {
        $this->tweets[] = $message;
    }

    public function assertTweetSent()
    {
        Assert::assertGreaterThan(0, count($this->tweets));
    }
}
