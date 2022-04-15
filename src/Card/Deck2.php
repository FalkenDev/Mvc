<?php

namespace App\Card;

// Deck Class
class DeckWith2Jokers extends Deck
{
    // Buiding the deck from the variables insert into the deck
    public function __construct(array $deck = [])
    {
        parent::__construct();
    }

    public function add2Joker() {
        $array = [];
        for ($i = 1; $i < 3; $i++) {
            $card = new Cards("Joker", "♠ ♥ ♣ ♦");
            array_push($array, $card);
        }
        return $array;
    }
}