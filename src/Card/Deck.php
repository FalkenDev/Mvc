<?php

namespace App\Card;

// Deck Class
class Deck
{
    private array $deck = [];
    private array $values = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
    private array $suits = ["♠", "♥", "♣", "♦"];

    // Buiding the deck from the variables insert into the deck
    public function decks()
    {
        foreach ($this->suits as $suit) {

            foreach ($this->values as $value) {
                $this->deck[] = new Cards($value, $suit);
            }
        }
    }

    // Show the whole deck function
    public function show_deck(): array
    {
        return $this->deck;
    }
}