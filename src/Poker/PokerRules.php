<?php

namespace App\Poker;

/**
 * PokerRules Class.
 *
 * @author Kasper Falk
 */
class PokerRules
{

    public array $arrayrules = [
        [10, 11, 12, 13, 14],
        [9, 10, 11, 12, 13],
        [8, 9, 10, 11, 12],
        [7, 8, 9, 10, 11],
        [6, 7, 8, 9, 10],
        [5, 6, 7, 8, 9],
        [4, 5, 6, 7, 8],
        [3, 4, 5, 6, 7],
        [2, 3, 4, 5, 6],
        [14, 2, 3, 4, 5],
    ];

    /**
     * Push board and hand to values, suites, poker values and cards into arrays.
     * Using for the rule classes.
     */
    public function pushToValueCards($hand, $board) {
        $values = [];
        $suites = [];
        $pokerValues = [];
        $allCards = [];
        // Hämtar alla values och pushar values i en array
        foreach ($board as $card) {
            $value = $card->get_value();
            $suite = $card->get_suite();
            $pokerValue = $card->get_pokerValue();
            array_push($values, $value);
            array_push($suites, $suite);
            array_push($pokerValues, $pokerValue);
            array_push($allCards, $card);
        }

        // Hämtar alla values och pushar values i en array
        foreach ($hand as $card) {
            $value = $card->get_value();
            $suite = $card->get_suite();
            $pokerValue = $card->get_pokerValue();
            array_push($values, $value);
            array_push($suites, $suite);
            array_push($pokerValues, $pokerValue);
            array_push($allCards, $card);
        }

        sort($pokerValues);

        $array = [array_count_values($values), array_count_values($suites), $pokerValues, $allCards];

        return $array;
    }

    /**
     * Check if player / dealer have a rule.
     * Starts from the highest rule ranking to the button.
     * return a array with the rule that player / dealer have and card values for the rule used.
     * 
     */
    public function checkAllRules($hand, $board) {
        $cards = $this->pushToValueCards($hand, $board);

        if($hand === []) {
            return ["Nothing", null];
        }

        if($this->royalFlush($cards)[0]) {
            return ["Royal Flush", $this->royalFlush($cards)[1]];

        } elseif($this->straightFlush($cards)[0]) {
            return ["Straigth Flush", $this->straightFlush($cards)[1]];

        } elseif($this->fourOfAKind($cards)[0]) {
            return ["Four Of A Kind", $this->fourOfAKind($cards)[1]];

        } elseif($this->fullHouse($cards)[0]) {
            return ["Full House", $this->fullHouse($cards)[1]];

        } elseif($this->flush($cards)) {
            return ["Flush", "same"];

        } elseif($this->straight($cards)[0]) {
            return ["Straight", $this->straight($cards)[1]];

        } elseif ($this->threeOfAKind($cards)[0]) {
            return ["Thee Of A Kind", $this->threeOfAKind($cards)[1]];

        } elseif ($this->twoPair($cards)[0]) {
            return ["Two Pair", $this->twoPair($cards)[1]];

        } elseif ($this->pair($cards)[0]) {
            return ["Pair", $this->pair($cards)[1]];

        }
        return ["High Card", null];
    }

    /**
     * Pair method
     * Checks if $hand + $board contains 2 cards with same value.
     * If pair: Returns true and the biggest pair value on the board / hand
     * Else: false and null
     */
    public function pair($fullHand) {
        $cardValues = [];
        $previousValue = 0;
        $hasPair = false;
        foreach ($fullHand[0] as $key => $value) {
            if($value >= 2) {
                $hasPair = true;
                array_push($cardValues, $key);
            }
        }

        if ($hasPair) {
            foreach($cardValues as $value) {
                if($value > $previousValue) {
                    $previousValue = $value;
                }
            }

            return [true, $previousValue];
        }
        return [false, null];
    }

    /**
     * Two Pair method
     * Checks if $hand + $board contains 2 pairs of cards with same value.
     */
    public function twoPair($fullHand) {
        $cardValues = [];
        $hasPair = false;
        $count = 0;
        foreach ($fullHand[0] as $key => $value) {
            if($value >= 2) {
                $count += 1;
                array_push($cardValues, $key);
            }
        }

        if ($count >= 2) {
            if($count >= 3) {
                sort($cardValues);
                $arrlength = count($cardValues);
                return [true, [$cardValues[$arrlength - 1], $cardValues[$arrlength - 2]]];
            }
            return [true, $cardValues];
        }
        return [false, null];
    }

    /**
     * Three Of A kind method
     * Checks if $hand + $board contains 3 cards with same value.
     */
    public function threeOfAKind($fullHand) {
        $cardValues = [];
        $previousValue = 0;
        $hasThree = false;
        $count = 0;
        foreach ($fullHand[0] as $key => $value) {
            if($value >= 3) {
                array_push($cardValues, $key);
                $hasThree = true;
                $count += 1;
            }
        }

        if($hasThree) {
            if($count >= 2) {
                sort($cardValues);
                $arrlength = count($cardValues);
                return [true, $cardValues[$arrlength - 1]];
            }
            return [true, $cardValues[0]];
        }

        return [false, null];
    }

    /**
     * Straight method
     * Checks if $hand + $board contains 5 cards with consecutive value.
     */
    public function straight($fullHand) {
        foreach ($this->arrayrules as $array) {
            if(!array_diff($array, $fullHand[2])) {
                if ($array[0] === 13) {
                    return [true, (array_sum($array) - 12)];
                }
                return [true, array_sum($array)];
            }
        }

        return [false, null];
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
        $hand = $fullHand[0];
        foreach ($hand as $key => $value) {
            if($value >= 3) {
                $three = true;
                $ThreeValue = $key;
                unset($hand[$key]);
            }
        }

        foreach ($hand as $key => $value) {
            if($value >= 2) {
                $two = true;
                $twoValue = $key;
            }
        }

        if($three and $two) {
            return [true, [$ThreeValue, $twoValue]];
        }
        return [false, null];
        
    }

    /**
     * Four Of A Kind method
     * Checks if $hand + $board contains 4 cards with same value.
     */
    public function fourOfAKind($fullHand) {
        foreach ($fullHand[0] as $key => $value) {
            if($value >= 4) {
                return [true, $key];
            }
        }

        return [false, null];
    }

    /**
     * Straight Flush method
     * Checks if $hand + $board contains five cards of sequential rank, all of the same suit.
     */
    public function straightFlush($fullHand) {
        $straightCheck = false;
        $suiteControll = "";
        $count = 0;
    
        foreach ($this->arrayrules as $array) {
            if(!array_diff($array, $fullHand[2])) {
                $straightArray = $array;
                $straightCheck = true;
            }
        }

        if ($straightCheck) {
            foreach ($fullHand[3] as $card) {
                $cardValue = $card->get_pokerValue();
                $cardSuite = $card->get_suite();
                if(in_array($cardValue, $straightArray) AND $cardSuite === $suiteControll OR in_array($cardValue, $straightArray) AND $suiteControll === "") {
                    $suiteControll = $cardSuite;
                    $count += 1;
                    if ($count >= 5) {
                        return [true, $straightArray];
                    }
                }
            }
        }

        return [false, null];
    }

    /**
     * Three Of A kind method
     * Checks if $hand + $board contains five cards of sequential rank, all of the same suit.
     */
    public function royalFlush($fullHand) {
        $suiteControll = "";
        $count = 0;
        $royalStraightRule = [10, 11, 12, 13, 14];
    
        if(!array_diff($royalStraightRule , $fullHand[2])) {
            foreach ($fullHand[3] as $card) {
                $cardValue = $card->get_pokerValue();
                $cardSuite = $card->get_suite();
                if(in_array($cardValue, $royalStraightRule ) AND $cardSuite === $suiteControll OR in_array($cardValue, $royalStraightRule ) AND $suiteControll === "") {
                    $suiteControll = $cardSuite;
                    $count += 1;
                    if ($count >= 5) {
                        return [true, $royalStraightRule ];
                    }
                }
            }
        }

        return [false, null];
    }
}