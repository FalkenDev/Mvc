<?php

namespace App\Card;

// Deck Class
class Blackjack extends Deck
{
    private array $deck = [];

    private array $dealerHand = [];
    private array $playerHand = [];

    // Buiding the deck from the variables insert into the deck
    public function __construct()
    {
        parent::__construct();
    }

    public function drawCardToPlayer(int $amount) {
        // Draws card to player
        $card = parent::draw($amount);
        print_r($card);
        array_push($this->playerHand, $card[0]);
        return $this->playerHand;
    }

    public function drawCardToDealer(int $amount) {
        // Draws card to dealer
        $card = parent::draw($amount);
        array_push($this->dealerHand, $card[0]);
        return $this->dealerHand;
    }

    /*
     * Draws card to dealer if player hit stand button
     */
    public function drawStandDealer() {
        $scoreList = $this->returnScore($this->dealerHand);
        $AceScore = 0;
        if ($scoreList[0] === $scoreList[1])
        {
            $prevCardValue;
            $score = $scoreList[0];
            while ($score < 17) {
                $card = parent::draw(1);
                $cardValue = $card[0]->get_value();
                $prevCardValue = $cardValue;
                array_push($this->dealerHand, $card[0]);
                $scoreListNew = $this->returnScore($this->dealerHand);
                if ($cardValue === "A" and $score > 10) {
                    $AceScore = -10;
                } elseif($prevCardValue === "A" and $score > 10) {
                    $AceScore = -10;
                } else {
                    $AceScore = 0;
                }
                $score = $scoreListNew[0];
                $score += $AceScore;
            }

            if ($scoreListNew[0] > 21 and $scoreListNew[1] < 21) {
                $prevCardValue;
                $score1 = $scoreList[1];
                while ($score1 < 17) {
                    $card = parent::draw(1);
                    $cardValue = $card[0]->get_value();
                    $prevCardValue = $cardValue;
                    array_push($this->dealerHand, $card[0]);
                    $scoreListNew = $this->returnScore($this->dealerHand);
                    $score1 = $scoreListNew[1];
                }
            }
        } else {
            $score = $scoreList[0];
            while ($score < 17) {
                $card = parent::draw(1);
                $cardValue = $card[0]->get_value();
                array_push($this->dealerHand, $card[0]);
                $scoreListNew = $this->returnScore($this->dealerHand);
                $score = $scoreListNew[0];
            }

            if ($score > 21) {
                $score1 = $scoreList[1];
                while ($score1 < 17) {
                    $card = parent::draw(1);
                    $cardValue = $card[0]->get_value();
                    array_push($this->dealerHand, $card[0]);
                    $scoreList = $this->returnScore($this->dealerHand);
                    $score1 = $scoreList[1];
                }
            }
        }
        return $this->dealerHand;
    }

    /*
     * Get total score for the hand and returns it
     */
    public function returnScore($hand) {
        $points = 0;
        $aces = 0;
        foreach ($hand as $card) {
            $cardValue = $card->get_value();

            if (is_numeric($cardValue)) {
                $points += $cardValue;
            } else {
                $points += 10;
                if ($cardValue === "A") {
                    $points += 1;
                    $aces++;
                }
            }
        }
        $pointsIfAce = $this->returnScoreAce($points, $aces);
        return [$points, $pointsIfAce];
    }

    /*
     * Returns total points minus 10 (ace is 1 point in this function)
     */
    public function returnScoreAce($score, $amountAce) {
        for ($x = 0; $x < $amountAce; $x++) {
            $score += -10;
        }

        return $score;
    }

    /*
     * Check if both score is over 21.
     * Returns true if both is over 21 else false
     */
    public function checkBust($score) {
        $bust = false;
        if ($score[0] > 21 and $score[1] > 21) {
            $bust = true;
        }

        return $bust;
    }

    /*
     * Check if a hand have ace in it.
     * Returns true if it has else false.
     */
    public function hasAce($hand) {
        $hasAce = false;
        foreach ($hand as $card) {
            $cardValue = $card->get_value();
            if ($cardValue === "A") {
                $hasAce = true;
            }
        }

        return $hasAce;
    }

    /*
     * Check who is the winner.
     * Checking both if has aces or no aces.
     */
    public function checkWinner($player, $dealer) {
        $playerScore = $this->returnScore($player);
        $playerHasAce = $this->hasAce($player);
        $playerSecondScore = false;

        $dealerScore = $this->returnScore($dealer);
        $dealerHasAce = $this->hasAce($dealer);
        $dealerSecondScore = false;

        if ($dealerHasAce) {
            if($dealerScore[0] > 21) {
                $dealerSecondScore = true;
            }
        }

        if ($playerHasAce) {
            if($playerScore[0] > 21) {
                $playerSecondScore = true;
            }
        }

        if ($this->checkBust($dealerScore)) {
            return "You have WON against the dealer!";
        }

        if ($playerSecondScore and $dealerSecondScore) {
            if ($playerScore[1] > $dealerScore[1] and $playerScore[1] <= 21) {
                return "You have WON against the dealer!";
            }
        } elseif ($playerSecondScore == false and $dealerSecondScore == false) {
            if ($playerScore[0] > $dealerScore[0] and $playerScore[0] <= 21) {
                return "You have WON against the dealer!";
            }
        } elseif ($playerSecondScore == false and $dealerSecondScore) {
            if ($playerScore[0] > $dealerScore[1] and $playerScore[0] <= 21) {
                return "You have WON against the dealer!";
            }
        } elseif ($playerSecondScore and $dealerSecondScore == false) {
            if ($playerScore[1] > $dealerScore[0] and $playerScore[1] <= 21) {
                return "You have WON against the dealer!";
            }
        }

        return"You have LOST against the dealer!";
    }
}