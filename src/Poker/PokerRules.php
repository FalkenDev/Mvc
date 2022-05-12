<?php

namespace App\Poker;

/**
 * PokerRules Class.
 *
 * @author Kasper Falk
 */
class PokerRules
{
    /**
     * High Card method
     * Checks if $hand + $board contains high cards.
     */
    public function highCard() {

    }

    /**
     * Pair method
     * Checks if $hand + $board contains 2 cards with same value.
     */
    public function pair() {
        
    }

    /**
     * Two Pair method
     * Checks if $hand + $board contains 2 pairs of cards with same value.
     */
    public function twoPair() {
        
    }

    /**
     * Three Of A kind method
     * Checks if $hand + $board contains 3 cards with same value.
     */
    public function threeOfAKind($hand) :array {
        foreach($hand as $card) {

        }
    }

    /**
     * Straight method
     * Checks if $hand + $board contains 5 cards with consecutive value.
     */
    public function straight() {
        
    }

    /**
     * Flush method
     * Checks if $hand + $board contains 5 cards with same suit.
     */
    public function flush() {
        
    }

    /**
     * Full House method
     * Checks if $hand + $board contains 3 cards of the same value, and 2 cards of a different, matching value (1 three of a kind and 1 pair).
     */
    public function fullHouse() {
        
    }

    /**
     * Four Of A Kind method
     * Checks if $hand + $board contains 4 cards with same value.
     */
    public function fourOfAKind() {
        
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