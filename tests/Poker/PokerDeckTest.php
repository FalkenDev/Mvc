<?php

namespace App\Poker;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class PokerDeck.
 */
class PokerDeckTest extends TestCase
{
    /**
     * Test to construct a poker deck.
     *
     * Look up if $die is an instance of \App\Poker\PokerDeck.
     * Look up $res is not empty after using show_deck method.
     */
    public function testCreateDeck()
    {
        $die = new Deck();
        $this->assertInstanceOf("\App\Card\PokerDeck", $die);

        $res = $die->show_deck();
        $this->assertNotEmpty($res);
    }

    /**
     * Test shuffle_deck work.
     * $shuffle using shuffle_deck method.
     * $noShuffle using show_deck method.
     *
     * Look up $shuffle is not equal to $noShuffle.
     */
    public function testShuffleDeck()
    {
        $die = new Deck();

        $noShuffle = $die->show_deck();
        $shuffle = $die->shuffle_deck();
        $this->	assertNotEquals($noShuffle, $shuffle);
    }

    /**
     * Test shuffle_deck work.
     * Input 1 into draw method (1 card).
     * Look up $res is not empty.
     */
    public function testDrawDeck()
    {
        $die = new Deck();

        $res = $die->draw(1);
        $this->assertNotEmpty($res);
    }
}