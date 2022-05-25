<?php

namespace App\Card;

/**
 * Blackjack Class.
 *
 * Inherits from Deck class.
 * @author Kasper Falk
 * @access private
 * @SuppressWarnings(PHPMD)
 */
class Blackjack extends Deck
{
    private array $dealerHand = [];
    private array $playerHand = [];

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
     * @return array $this->playerHand
     */
    public function drawCardToPlayer(int $amount)
    {
        // Draws card to player
        $card = parent::draw($amount);
        array_push($this->playerHand, $card[0]);
        return $this->playerHand;
    }

    /**
     * Draws card to dealer.
     * draw method is from Deck class.
     *
     * @param int $amount Amount cards to draw.
     * @return array $this->dealerHand
     */
    public function drawCardToDealer(int $amount)
    {
        // Draws card to dealer
        $card = parent::draw($amount);
        array_push($this->dealerHand, $card[0]);
        return $this->dealerHand;
    }

    /**
     * Draws cards to dealer if player pushed stand button.
     * Draws cards until dealer have 17 or more in score
     *
     * @return array $this->dealerHand
     */
    public function drawStandDealer()
    {
        $dealerScore = $this->getOneScore($this->returnScore($this->dealerHand));
        while ($dealerScore < 17) {
            $card = parent::draw(1);
            array_push($this->dealerHand, $card[0]);
            $dealerScore = $this->getOneScore($this->returnScore($this->dealerHand));
            if ($dealerScore === 1) {
                return $this->dealerHand;
            }
        }
        return $this->dealerHand;
    }

    /**
     * Get total score for the hand.
     * Ace ("A") in this method is worth 11 points.
     * @see method returnScoreAce ( Ace worth 1 point )
     * @return array [$points, $pointsIfAce]
     */
    public function returnScore($hand)
    {
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

    /**
     * Get total score for the hand.
     * Ace ("A") in this method is worth 1 points.
     * @see method returnScore ( Ace worth 11 points )
     *
     * @param int $score Total score of hand (Ace is worth 11 points).
     * @param int $amountAce Amount aces ("A") in the hand.
     *
     * @return int $score Returns total score - 10 points for each aces in the hand.
     */
    public function returnScoreAce($score, $amountAce)
    {
        for ($x = 0; $x < $amountAce; $x++) {
            $score += -10;
        }

        return $score;
    }

    /**
     * Get only one score
     * Returns hight score that are under 21.
     * If both score in array is over 21 then return 1
     * @param array $score The hands totalpoints in array.
     */
    public function getOneScore($score)
    {
        if ($score[0] === $score[1]) {
            if ($score[0] > 21) {
                return 1;
            }

            return $score[0];
        } elseif ($score[0] <= 21) {
            return $score[0];
        } else {
            if ($score[1] > 21) {
                return 1;
            } else {
                return $score[1];
            }
        }
    }

    /**
     * Check if both scores in array is over 21.
     * Returns true if both is over 21 else false.
     *
     * @param array $score The hands totalpoints.
     *
     * @return boolean $bust True = bust and False = not bust.
     */
    public function checkBust($score)
    {
        $bust = false;
        if ($score[0] > 21 and $score[1] > 21) {
            $bust = true;
        }

        return $bust;
    }

    /**
     * Check who is the winner.
     * Checking both if has aces or no aces.
     *
     * @param array $playerHand Player hand with cards
     * @param array $dealerHand Dealer hand with cards
     *
     * @return string
     */
    public function checkWinner($playerHand, $dealerHand)
    {
        $playerScore = $this->getOneScore($this->returnScore($playerHand));

        $dealerScore = $this->getOneScore($this->returnScore($dealerHand));

        if ($playerScore > $dealerScore) {
            return "You have WON against the dealer!";
        }
        return "You have LOST against the dealer!";
    }
}
