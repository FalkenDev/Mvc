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
     * If player bets / push Ante button.
     * Draw 2 cards to Player and 3 cards to the board.
     * @return
     */
    public function ante()
    {
        $this->drawCardToPlayer(2);
        $this->drawCardToBoard(3);

        // Return player and board cards for PokerTest class
        return [$this->playerHand, $this->board];
    }

    /**
     * If player push Calls after Ante.
     * Draw 2 cards to dealer and the last 2 cards to the board.
     * @return
     */
    public function call()
    {
        $this->drawCardToDealer(2);
        $this->drawCardToBoard(2);

        // Return dealer and board cards for PokerTest class
        return [$this->dealerHand, $this->board];
    }

    /**
     * Return all cards from the board (Middle section).
     * @return board
     */
    public function get_BoardCards()
    {
        return $this->board;
    }

    /**
     * Return all cards from the Players hand (Down section).
     * @return playerHand
     */
    public function get_PlayerCards()
    {
        return $this->playerHand;
    }

    /**
     * Return all cards from the Dealers hand (Upper section).
     * @return dealerHand
     */
    public function get_DealerCards()
    {
        return $this->dealerHand;
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

    public function checkWinner() {

    }

    public function payOdds($betAmount, $rule) {
        $odds = 0;
        switch ($rule) {
            case "Royal flush":
                $odds = 100;
                break;
            case "Straigth flush":
                $odds = 20;
                break;
            case "Four of a kind":
                $odds = 10;
                break;
            case "Full house":
                $odds = 4;
                break;
            case "Flush":
                $odds = 3;
                break;
            case "Straight":
                $odds = 2;
                break;
            case "Three of a kind":
                $odds = 1;
                break;
            case "Two Pair":
                $odds = 1;
                break;
            case "Pair":
                $odds = 1;
                break;
            case "High Card":
                $odds = 1;
                break;
        }

        return ($betAmount * $odds);
    }
}