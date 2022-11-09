<?php

namespace Tests\Unit;

use App\Services\StringUtils;
use PHPUnit\Framework\TestCase;

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

    /** @test */
    public function it_should_capitalize_first_letter()
    {
        // Given
        $word = 'peter';
        // When
        $result = StringUtils::capitalizeFirstLetter($word);
        // Then
        $this->assertEquals('Peter', $result);
    }
}
