<?php

namespace App\Poker;

/**
 * Cards Class.
 *
 * @author Kasper Falk
 * @access public
 */
class PokerCards
{
    public string $value;
    public string $suite;
    public string $pokerValue;

    /**
     * Constructing card from value and suits
     *
     * @param string $value The card value.
     * @param string $suits The card suite.
     * @param int $pokerValue The value in poker.
     *
     * @return void
     */
    public function __construct(string $value, string $suits, $pokerValue)
    {
        $this->value = $value;
        $this->suite = $suits;
        $this->pokerValue = $pokerValue;
    }

    /**
     * Gets the card value
     *
     * @return string $value
     */
    public function get_value(): string
    {
        return $this->value;
    }

    /**
     * Gets the card suite
     *
     * @return string $suite
     */
    public function get_suite(): string
    {
        return $this->suite;
    }

    /**
     * Gets the card pokerValue
     *
     * @return int $pokerValue
     */
    public function get_pokerValue(): int
    {
        return $this->pokerValue;
    }
}
