<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function it_should_check_whether_a_string_is_a_palindrome()
    {
        // Given
        $str = 'Anna';
        // When
        $result = StringUtils::isPalindrome($str);
        // Then
        $this->assertTrue($result);
    }
}
