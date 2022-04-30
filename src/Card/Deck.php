<?php

namespace App\Card;

/**
 * Deck Class.
 *
 * @author Kasper Falk
 * @access private
 */
class Deck
{
    private array $deck;
    private array $values = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
    private array $suits = ["♠", "♥", "♣", "♦"];

    /**
     * Buiding the deck from the variables insert into the deck
     * Calling Cards class to build the cards.
     *
     * @return void
     */
    public function __construct()
    {
        $this->deck = [];
        foreach ($this->suits as $suit) {
            foreach ($this->values as $value) {
                $this->deck[] = new Cards($value, $suit);
            }
        }
    }

    /**
     * Show the whole deck (pack of cards).
     *
     * @return array $deck
     */
    public function show_deck(): array
    {
        return $this->deck;
    }

    /**
     * Shuffle the deck.
     *
     * @return array $deck Shuffled deck.
     */
    public function shuffle_deck(): array
    {
        shuffle($this->deck);
        return $this->deck;
    }

    /**
     * draw a card from the deck.
     *
     * @param int $numDraw Amount of cards to draw
     * @return array $card
     */
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

        return $card ?? [];
    }
}
