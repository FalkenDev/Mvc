<?php

namespace App\Card;

/**
 * Cards Class.
 *
 * @author Kasper Falk
 * @access public
 * @SuppressWarnings(PHPMD)
 */
class Cards
{
    public string $value;
    public string $suite;

    /**
     * Constructing card from value and suits
     *
     * @param string $value The card value.
     * @param string $suits The card suite.
     *
     * @return void
     */
    public function __construct(string $value, string $suits)
    {
        $this->value = $value;
        $this->suite = $suits;
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
}
