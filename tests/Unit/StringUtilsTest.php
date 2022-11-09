<?php

namespace Tests\Unit;

use App\Services\StringUtils;
use PHPUnit\Framework\TestCase;

class StringUtilsTest extends TestCase
{
    /** @test */
    public function it_should_check_whether_a_string_is_a_palindrome()
    {
        $this->assertTrue(StringUtils::isPalindrome('Anna'));
    }

    /** @test */
    public function it_should_check_whether_a_string_is_not_a_palindrome()
    {
        $this->assertFalse(StringUtils::isPalindrome('Jürgen'));
    }

    /** @test */
    public function it_should_check_whether_empty_string_is_a_palindrome()
    {
        $this->assertFalse(StringUtils::isPalindrome(''));
    }

    /** @test */
    public function it_should_capitalize_every_word()
    {
        $str = 'we are having a workshop';
        $result = StringUtils::capitalize($str);
        $this->assertEquals('We Are Having A Workshop', $result);
    }

    /** @test */
    public function it_should_add_a_space_after_every_letter()
    {
        $str = 'Anna';
        $result = StringUtils::addSpaceAfterEveryLetter($str);
        $this->assertEquals('A n n a', $result);
    }

    /** @test */
    public function it_should_remove_letter()
    {
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

    /** @test */
    public function it_should_capatilize_first_letter_of_word()
    {
        // Given
        $str = 'hallo welt';
        // When
        $result = StringUtils::capatilizeWords($str);
        // Then
        $this->assertEquals('Hallo Welt', $result);
    }

    /** @test */
    public function it_should_add_spaces_after_every_letter_except_last_one()
    {
        // Given
        $str = 'hallo';
        // When
        $result = StringUtils::addSpaces($str);
        // Then
        $this->assertEquals('h a l l o', $result);
    }

    /** @test */
    public function remove_particular_letter_from_string()
    {
        // Given
        $str = 'hallo';
        // When
        $result = StringUtils::removeLetterFromString($str, 'l');
        // Then
        $this->assertEquals('hao', $result);
        $this->assertNotContains('l', str_split($result));
    }
}
