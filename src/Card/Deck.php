<?php

namespace App\Card;

// Deck Class
class Deck
{
    private array $deck;
    private array $values = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
    private array $suits = ["♠", "♥", "♣", "♦"];

    // Buiding the deck from the variables insert into the deck
    public function __construct(array $deck = [])
    {
        $this->deck = $deck;
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

    public function shuffle_deck(): array
    {
        shuffle($this->deck);
        return $this->deck;
    }

    public function draw(int $numDraw)
    {
        $random_card = array_rand($this->deck, $numDraw);
        for ($i = 1; $i <= $numDraw; $i++) {
            if (is_array($random_card)) {
                $card[] = $this->deck[$random_card[$i - 1]];
                unset($this->deck[$random_card[$i - 1]]);
            } else {
                $card[] = $this->deck[$random_card];
                unset($this->deck[$random_card]);
            }
        }
        return $card;
    }
}
