<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Cards.
 */
class CardsTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties, use no arguments.
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
