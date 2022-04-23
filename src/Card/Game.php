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
        $scoreList = $this->returnScore($this->dealerHand);
        if ($scoreList[0] === $scoreList[1])
        {
            $score = $scoreList[0];
            while ($score < 17) {
                $card = parent::draw(1);
                $cardValue = $card[0]->get_value();
                array_push($this->dealerHand, $card[0]);
                $scoreListNew = $this->returnScore($this->dealerHand);
                $score = $scoreListNew[0];
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

    public function returnScoreAce($score, $amountAce) {
        for ($x = 0; $x < $amountAce; $x++) {
            $score += -10;
        }

        return $score;
    }

    public function checkBust($score) {
        $bust = false;
        if ($score[0] > 21 and $score[1] > 21) {
            $bust = true;
        }

        return $bust;
    }

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

    public function checkWinner($player, $dealer) {
        $winner = "";
        $whoWin = [];
        $playerScore = $this->returnScore($player);
        $playerHasAce = $this->hasAce($player);

        $dealerScore = $this->returnScore($dealer);
        $dealerHasAce = $this->hasAce($dealer);

        for ($x = 0; $x < 2; $x++) {
            for ($y = 0; $y < 2; $y++) {
                array_push($whoWin, $this->checkScore($playerScore[$x], $dealerScore[$y]));
            }
        }

        print_r($whoWin);

        if (in_array(true, $whoWin)) {
            if($playerScore[0] === 21 or $playerScore[1] === 21) {
                return "You have WON against the dealer!";
            } elseif($dealerScore[0] === 21 or $dealerScore[1] === 21) {
                return "You have LOST against the dealer!";
            } elseif ($dealerScore[1] > $playerScore[0] and $dealerScore[1] <= 21) {
                return "You have LOST against the dealer!";
            } elseif ($dealerScore[1] > $playerScore[1] and $dealerScore[1] <= 21) {
                return "You have LOST against the dealer!";
            } else {
                return "You have WON against the dealer!";
            }
        } else {
            return"You have LOST against the dealer!";
        }

    }

    public function checkScore($playerScore, $dealerScore) {
        if ($playerScore === 21 and $dealerScore === 21) {
            return true;
        } elseif ($playerScore > 21) {
            return false;
        } elseif ($dealerScore > 21) {
            return true;
        } elseif( $playerScore > $dealerScore) {
            return true;
        } else {
            return false;
        }
    }

    public function checkWin($dealer, $player) {
        
    }
}