<?php

namespace App\Poker;

/**
 * PokerRules Class.
 *
 * @author Kasper Falk
 */
class PokerRules
{

    public function pushToValueCards($hand, $board) {
        $values = [];
        $suites = [];
        // Hämtar alla values och pushar values i en array
        foreach ($board as $card) {
            $value = $card->get_value();
            $suite = $card->get_suite();
            array_push($values, $value);
            array_push($suites, $suite);
        }

        // Hämtar alla values och pushar values i en array
        foreach ($hand as $card) {
            $value = $card->get_value();
            $suite = $card->get_suite();
            array_push($values, $value);
            array_push($suites, $suite);
        }

        $array = [array_count_values($values), array_count_values($suites)];

        return $array;
    }

    public function checkAllRules($hand, $board) {
        $cards = $this->pushToValueCards($hand, $board);
        if($this->fourOfAKind($cards)) {
            return "Four Of A Kind";
        } elseif($this->fullHouse($cards)) {
            return "Full House";
        } elseif($this->flush($cards)) {
            return "Flush";
        } elseif ($this->threeOfAKind($cards)) {
            return "Thee Of A Kind";
        } elseif ($this->twoPair($cards)) {
            return "Two Pair";
        } elseif ($this->pair($cards)) {
            return "Pair";
        }
        return "Nothing";
    }

    /**
     * High Card method
     * Checks if $hand + $board contains high cards.
     */
    public function highCard($hand, $board) {

    }

    /**
     * Pair method
     * Checks if $hand + $board contains 2 cards with same value.
     */
    public function pair($fullHand) {
        foreach ($fullHand[0] as $key => $value) {
            if($value >= 2) {
                return true;
            }
        }

        return false;
    }

    /**
     * Two Pair method
     * Checks if $hand + $board contains 2 pairs of cards with same value.
     */
    public function twoPair($fullHand) {
        $count = 0;
        foreach ($fullHand[0] as $key => $value) {
            if($value >= 2) {
                $count += 1;
            }
        }

        if ($count >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Three Of A kind method
     * Checks if $hand + $board contains 3 cards with same value.
     */
    public function threeOfAKind($fullHand) {
        foreach ($fullHand[0] as $key => $value) {
            if($value >= 3) {
                return true;
            }
        }

        return false;
    }

    /**
     * Straight method
     * Checks if $hand + $board contains 5 cards with consecutive value.
     */
    public function straight($fullHand) {

    }

    /**
     * Flush method
     * Checks if $hand + $board contains 5 cards with same suit.
     */
    public function flush($fullHand) {
        foreach ($fullHand[1] as $key => $value) {
            if($value >= 5) {
                return true;
            }
        }
        return false;
    }

    /**
     * Full House method
     * Checks if $hand + $board contains 3 cards of the same value, and 2 cards of a different, matching value (1 three of a kind and 1 pair).
     */
    public function fullHouse($fullHand) {
        $three = false;
        $two = false;
        $hand = $cards[0];
        foreach ($hand as $key => $value) {
            if($value >= 3) {
                $three = true;
                unset($hand[$key]);
            }
        }

        foreach ($hand as $key => $value) {
            if($value >= 2) {
                $two = true;
            }
        }

        if($three and $two) {
            return true;
        }
        return false;
        
    }

    /**
     * Four Of A Kind method
     * Checks if $hand + $board contains 4 cards with same value.
     */
    public function fourOfAKind($fullHand) {
        foreach ($fullHand[0] as $key => $value) {
            if($value >= 4) {
                return true;
            }
        }

        return false;
    }

    /**
     * Straight Flush method
     * Checks if $hand + $board contains five cards of sequential rank, all of the same suit.
     */
    public function straightFlush() {
        
    }

    /**
     * Three Of A kind method
     * Checks if $hand + $board contains five cards of sequential rank, all of the same suit.
     */
    public function royalFlush() {
        
    }
}