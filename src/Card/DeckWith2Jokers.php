<?php

namespace App\Card;

/**
 * Deck2 Class.
 * Inherits from Deck class.
 * @author Kasper Falk
 * @access private
 * @SuppressWarnings(PHPMD)
 */
class DeckWith2Jokers extends Deck
{
    /**
     * Construct method.
     * Creating pack of cards for deck with jokers.
     * Using Deck class construction.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Adding 2 jokers into deck
     * @return array $array
     */
    public function add2Joker()
    {
        $array = [];
        for ($i = 1; $i < 3; $i++) {
            $card = new Cards("Joker", "♠ ♥ ♣ ♦");
            array_push($array, $card);
        }
        return $array;
    }
}
