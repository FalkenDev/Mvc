<?php

namespace App\Card;

// Deck Class
class Blackjack extends Deck
{
    private array $deck = [];

    private array $dealerHand = [];
    private int $dealerScore;

    private array $playerHand = [];
    private int $playerScore;

    // Buiding the deck from the variables insert into the deck
    public function __construct()
    {
        parent::__construct();
    }

    public function drawCardToPlayer(int $amount) {
        $card = parent::draw($amount);
        print_r($card);
        array_push($this->playerHand, $card[0]);
        return $this->playerHand;
    }

    public function drawCardToDealer(int $amount) {
        $card = parent::draw($amount);
        array_push($this->dealerHand, $card[0]);
        return $this->dealerHand;
    }

    public function drawStandDealer() {
        $score = $this->returnScore($this->dealerHand);
        while ($score < 17) {
            $card = parent::draw(1);
            $cardValue = $card[0]->get_value();
            array_push($this->dealerHand, $card[0]);
            $score = $this->returnScore($this->dealerHand);
        }
        return $this->dealerHand;
    }

    public function returnScore($hand) {
        $points = 0;
        foreach ($hand as $card) {
            $cardValue = $card->get_value();

            if (is_numeric($cardValue)) {
                $points += $cardValue;
            } else {
                $points += 10;
                if ($cardValue === "A") {
                    $points += 1;
                }
            }
        }
        return $points;
    }

    public function returnScoreAce($hand) {

    }

    public function checkBustOr21($score) {
        if ($score === 21 ) {
            return "You win";
        } elseif ($score > 21) {
            return "You bust";
        }

        return "wrong";

    }

    public function checkWin($dealer, $player) {
        
    }
}