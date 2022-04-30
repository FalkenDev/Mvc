<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Cards.
 */
class CardsTest extends TestCase
{
    /**
     * Test to construct a card work.
     * Input value 2 and suite ♥ into Cards
     *
     * Look up if $die is an instance of \App\Card\Cards.
     * Look up if $resValue and $resSuite is a string from get_value and get_suite method.
     */
    public function testCreateCard()
    {
        $die = new Cards("2", "♥");
        $this->assertInstanceOf("\App\Card\Cards", $die);

        $resValue = $die->get_value();
        $this->assertIsString($resValue);

        $resSuite = $die->get_suite();
        $this->assertIsString($resSuite);
    }
}
