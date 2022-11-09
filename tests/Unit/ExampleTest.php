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
    public function it_should_capitalize_every_word(){
        $str = 'we are having a workshop';
        $result = StringUtils::capitalize($str);
        $this->assertEquals('We Are Having A Workshop', $result);
    }

    /** @test */
    public function it_should_add_a_space_after_every_letter(){
        $str = 'Anna';
        $result = StringUtils::addSpaceAfterEveryLetter($str);
        $this->assertEquals('A n n a', $result);
    }

    /** @test */
    public function it_should_remove_letter(){
        $str= 'Anna';
        $result = StringUtils::removeGivenLetter($str, 'a');
        $this->assertEquals('nn', $result);
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
