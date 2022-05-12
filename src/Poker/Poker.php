<?php

namespace App\Poker;

/**
 * Poker Class.
 *
 * @author Kasper Falk
 */
class Poker extends PokerDeck
{

    private array $deck = [];
    private array $dealerHand = [];
    private array $playerHand = [];
    private array $board = [];

    /**
     * Construct method.
     * Creating pack of cards for Blackjack game.
     * Using Deck class construction.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Draws card to player.
     * draw method is from Deck class.
     *
     * @param int $amount Amount cards to draw.
     * @return $this->playerHand
     */
    public function drawCardToPlayer(int $amount)
    {
        // Draws card to player
        $card = parent::draw($amount);
        for ($x = 0; $x < count($card); $x++) {
            array_push($this->playerHand, $card[$x]);
        }
        return $this->playerHand;
    }

    /**
     * Draws card to dealer.
     * draw method is from Deck class.
     *
     * @param int $amount Amount cards to draw.
     * @return $this->dealerHand
     */
    public function drawCardToDealer(int $amount)
    {
        // Draws card to dealer
        $card = parent::draw($amount);
        for ($x = 0; $x < count($card); $x++) {
            array_push($this->dealerHand, $card[$x]);
        }
        return $this->dealerHand;
    }

    /**
     * Draws card to the board.
     * draw method is from Deck class.
     *
     * @param int $amount Amount cards to draw.
     * @return $this->dealerHand
     */
    public function drawCardToBoard(int $amount)
    {
        // Draws card to dealer
        $card = parent::draw($amount);
        for ($x = 0; $x < count($card); $x++) {
            array_push($this->board, $card[$x]);
        }
        return $this->board;
    }
}