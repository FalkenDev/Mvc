<?php

namespace App\Poker;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Blackjack.
 */
class PokerRulesTest extends TestCase
{
    /**
     * Test to construct a deck.
     *
     * Look up if $die is an instance of \App\Card\Blackjack and $res is an array.
     */
    public function testCreateDeckForBlackjack()
    {
        $die = new Blackjack();
        $this->assertInstanceOf("\App\Card\Blackjack", $die);

        $res = $die->show_deck();
        $this->assertIsArray($res);
    }
}
