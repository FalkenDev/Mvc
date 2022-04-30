<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Deck.
 */
class DeckTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties, use no arguments.
     */
    public function testCreateDeck()
    {
        $die = new Deck();
        $this->assertInstanceOf("\App\Card\Deck", $die);

        $res = $die->show_deck();
        $this->assertNotEmpty($res);
    }

    public function testShuffleDeck()
    {
        $die = new Deck();
        $this->assertInstanceOf("\App\Card\Deck", $die);

        $noShuffle = $die->shuffle_deck();
        $shuffle = $die->shuffle_deck();
        $this->assertNotContains($noShuffle, $shuffle);
    }

    public function testDrawDeck()
    {
        $die = new Deck();
        $this->assertInstanceOf("\App\Card\Deck", $die);

        $res = $die->show_deck();
        $this->assertNotEmpty($res);
    }
}