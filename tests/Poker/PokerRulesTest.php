<?php

namespace App\Poker;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Blackjack.
 */
class PokerRulesTest extends TestCase
{

    public array $player;
    public array $board;
    public array $dealer;

    public array $boardHighCard;
    public array $playerHighCard;

    /**
     * Test pushToValueCards method.
     * Check if both dealer and player returns a array with arrays.
     */
    public function testPushtoValueCards()
    {
        // Inserting cards for the board.
        for ($i = 1; $i <= 3; $i++){
            $this->board[] = new PokerCards("3", "♠", 3);
        }
        for ($i = 1; $i <= 2; $i++){
            $this->board[] = new PokerCards("A", "♦", 14);
        }

        // Inserting cards for the player.
        for ($i = 1; $i <= 2; $i++){
            $this->player[] = new PokerCards("A", "♣", 14);
        }

        // Inserting cards for the Dealer.
        for ($i = 1; $i <= 2; $i++){
            $this->dealer[] = new PokerCards("J", "♣", 14);
        }

        $die = new PokerRules();
        $player = $die->pushToValueCards($this->player, $this->board);
        $dealer = $die->pushToValueCards($this->dealer, $this->board);
        $this->assertIsArray($player);
        $this->assertIsArray($dealer);

    }

    /**
     * Test checkAllRules method.
     * 
     * Check if method returns a array and first element returns a string that says Four Of A Kind.
     * 
     * Test if checkAllRules returns a array with first element says nogthing if put in 2 empty arrays in the method.
     */
    public function testCheckAllRules()
    {

        // Inserting 3 cards to the board ( 3 cards with value 3, suite ♠ and pokerValue 3).
        for ($i = 1; $i <= 3; $i++){
            $this->board[] = new PokerCards("3", "♠", 3);
        }

        // Inserting 2 more cars to the board ( 2 cards with value A, suite ♦ and pokerValue 14).
        for ($i = 1; $i <= 2; $i++){
            $this->board[] = new PokerCards("A", "♦", 14);
        }

        // Inserting cards to the player ( 2 cards with value A, suite ♣ and pokerValue 14).
        for ($i = 1; $i <= 2; $i++){
            $this->player[] = new PokerCards("A", "♣", 14);
        }

        $die = new PokerRules();
        $rulePlayer = $die->checkAllRules($this->player, $this->board);
        $this->assertStringContainsString('Four Of A Kind', $rulePlayer[0]);

        $ruleEmpty = $die->checkAllRules([], []);
        $this->assertStringContainsString('Nothing', $ruleEmpty[0]);
        
    }

    /**
     * Test Pair method.
     */
    public function testPairRule()
    {
        $this->player[] = new PokerCards("A", "♣", 14);
        $this->player[] = new PokerCards("J", "♣", 11);

        $this->board[] = new PokerCards("A", "♦", 14);
        $this->board[] = new PokerCards("3", "♠", 3);
        $this->board[] = new PokerCards("K", "♠", 13);

        $die = new PokerRules();
        $allCards = $die->pushToValueCards($this->player, $this->board);
        $result = $die->pair($allCards);
        $this->assertTrue($result[0]);

        $this->playerHighCard[] = new PokerCards("2", "♣", 2);
        $this->playerHighCard[] = new PokerCards("4", "♦", 4);

        $this->boardHighCard[] = new PokerCards("8", "♦", 8);
        $this->boardHighCard[] = new PokerCards("J", "♥", 11);
        $this->boardHighCard[] = new PokerCards("K", "♦", 13);
        $this->boardHighCard[] = new PokerCards("A", "♠", 14);
        $this->boardHighCard[] = new PokerCards("9", "♥", 9);

        $allCardsNoPair = $die->pushToValueCards($this->playerHighCard, $this->boardHighCard);
        $result = $die->pair($allCardsNoPair);
        $this->assertFalse($result[0]);
        
    }

    public function testTwoPairRule()
    {
        $this->player[] = new PokerCards("A", "♣", 14);
        $this->player[] = new PokerCards("J", "♣", 11);

        $this->board[] = new PokerCards("A", "♦", 14);
        $this->board[] = new PokerCards("J", "♠", 3);
        $this->board[] = new PokerCards("K", "♠", 13);

        $die = new PokerRules();
        $allCards = $die->pushToValueCards($this->player, $this->board);
        $result = $die->twoPair($allCards);
        $this->assertTrue($result[0]);

        $this->playerHighCard[] = new PokerCards("2", "♣", 2);
        $this->playerHighCard[] = new PokerCards("4", "♦", 4);

        $this->boardHighCard[] = new PokerCards("8", "♦", 8);
        $this->boardHighCard[] = new PokerCards("J", "♥", 11);
        $this->boardHighCard[] = new PokerCards("K", "♦", 13);
        $this->boardHighCard[] = new PokerCards("A", "♠", 14);
        $this->boardHighCard[] = new PokerCards("9", "♥", 9);

        $allCardsNoPair = $die->pushToValueCards($this->playerHighCard, $this->boardHighCard);
        $result = $die->twoPair($allCardsNoPair);
        $this->assertFalse($result[0]);
        
    }

    public function testThreeOfAKindRule()
    {
        $this->player[] = new PokerCards("A", "♣", 14);
        $this->player[] = new PokerCards("A", "♠", 14);

        $this->board[] = new PokerCards("A", "♦", 14);
        $this->board[] = new PokerCards("J", "♠", 3);
        $this->board[] = new PokerCards("K", "♠", 13);

        $die = new PokerRules();
        $allCards = $die->pushToValueCards($this->player, $this->board);
        $result = $die->threeOfAKind($allCards);
        $this->assertTrue($result[0]);


        $this->playerHighCard[] = new PokerCards("2", "♣", 2);
        $this->playerHighCard[] = new PokerCards("4", "♦", 4);

        $this->boardHighCard[] = new PokerCards("8", "♦", 8);
        $this->boardHighCard[] = new PokerCards("J", "♥", 11);
        $this->boardHighCard[] = new PokerCards("K", "♦", 13);
        $this->boardHighCard[] = new PokerCards("A", "♠", 14);
        $this->boardHighCard[] = new PokerCards("9", "♥", 9);

        $allCardsNoPair = $die->pushToValueCards($this->playerHighCard, $this->boardHighCard);
        $result = $die->threeOfAKind($allCardsNoPair);
        $this->assertFalse($result[0]);
        
    }

    public function testStraightRule()
    {
        $this->player[] = new PokerCards("A", "♣", 14);
        $this->player[] = new PokerCards("2", "♠", 2);

        $this->board[] = new PokerCards("3", "♦", 3);
        $this->board[] = new PokerCards("4", "♠", 4);
        $this->board[] = new PokerCards("5", "♠", 5);

        $die = new PokerRules();
        $allCards = $die->pushToValueCards($this->player, $this->board);
        $result = $die->straight($allCards);
        $this->assertTrue($result[0]);


        $this->playerHighCard[] = new PokerCards("2", "♣", 2);
        $this->playerHighCard[] = new PokerCards("4", "♦", 4);

        $this->boardHighCard[] = new PokerCards("8", "♦", 8);
        $this->boardHighCard[] = new PokerCards("J", "♥", 11);
        $this->boardHighCard[] = new PokerCards("K", "♦", 13);
        $this->boardHighCard[] = new PokerCards("A", "♠", 14);
        $this->boardHighCard[] = new PokerCards("9", "♥", 9);

        $allCardsNoPair = $die->pushToValueCards($this->playerHighCard, $this->boardHighCard);
        $result = $die->straight($allCardsNoPair);
        $this->assertFalse($result[0]);
        
    }

    /**
     * Test false outcome
     */
    public function testFlushRule()
    {
        $this->player[] = new PokerCards("A", "♠", 14);
        $this->player[] = new PokerCards("J", "♠", 2);

        $this->board[] = new PokerCards("3", "♠", 3);
        $this->board[] = new PokerCards("K", "♠", 4);
        $this->board[] = new PokerCards("2", "♠", 5);

        $die = new PokerRules();
        $allCards = $die->pushToValueCards($this->player, $this->board);
        $result = $die->flush($allCards);
        $this->assertTrue($result);


        $this->playerHighCard[] = new PokerCards("2", "♣", 2);
        $this->playerHighCard[] = new PokerCards("4", "♦", 4);

        $this->boardHighCard[] = new PokerCards("8", "♦", 8);
        $this->boardHighCard[] = new PokerCards("J", "♥", 11);
        $this->boardHighCard[] = new PokerCards("K", "♦", 13);
        $this->boardHighCard[] = new PokerCards("A", "♠", 14);
        $this->boardHighCard[] = new PokerCards("9", "♥", 9);

        $allCardsNoPair = $die->pushToValueCards($this->playerHighCard, $this->boardHighCard);
        $result = $die->flush($allCardsNoPair);
        $this->assertFalse($result);
        
    }

    public function testFullHouseRule()
    {
        $this->player[] = new PokerCards("A", "♦", 14);
        $this->player[] = new PokerCards("5", "♣", 5);

        $this->board[] = new PokerCards("A", "♣", 14);
        $this->board[] = new PokerCards("5", "♥", 5);
        $this->board[] = new PokerCards("5", "♦", 5);

        $die = new PokerRules();
        $allCards = $die->pushToValueCards($this->player, $this->board);
        $result = $die->fullHouse($allCards);
        $this->assertTrue($result[0]);


        $this->playerHighCard[] = new PokerCards("2", "♣", 2);
        $this->playerHighCard[] = new PokerCards("4", "♦", 4);

        $this->boardHighCard[] = new PokerCards("8", "♦", 8);
        $this->boardHighCard[] = new PokerCards("J", "♥", 11);
        $this->boardHighCard[] = new PokerCards("K", "♦", 13);
        $this->boardHighCard[] = new PokerCards("A", "♠", 14);
        $this->boardHighCard[] = new PokerCards("9", "♥", 9);

        $allCardsNoPair = $die->pushToValueCards($this->playerHighCard, $this->boardHighCard);
        $result = $die->fullHouse($allCardsNoPair);
        $this->assertFalse($result[0]);
        
    }

    public function testFourOfAKindRule()
    {
        $this->player[] = new PokerCards("8", "♦", 8);
        $this->player[] = new PokerCards("8", "♣", 8);

        $this->board[] = new PokerCards("A", "♣", 14);
        $this->board[] = new PokerCards("8", "♥", 8);
        $this->board[] = new PokerCards("8", "♦", 8);

        $die = new PokerRules();
        $allCards = $die->pushToValueCards($this->player, $this->board);
        $result = $die->fourOfAKind($allCards);
        $this->assertTrue($result[0]);


        $this->playerHighCard[] = new PokerCards("2", "♣", 2);
        $this->playerHighCard[] = new PokerCards("4", "♦", 4);

        $this->boardHighCard[] = new PokerCards("8", "♦", 8);
        $this->boardHighCard[] = new PokerCards("J", "♥", 11);
        $this->boardHighCard[] = new PokerCards("K", "♦", 13);
        $this->boardHighCard[] = new PokerCards("A", "♠", 14);
        $this->boardHighCard[] = new PokerCards("9", "♥", 9);

        $allCardsNoPair = $die->pushToValueCards($this->playerHighCard, $this->boardHighCard);
        $result = $die->fourOfAKind($allCardsNoPair);
        $this->assertFalse($result[0]);
        
    }

    public function testStraightFlushRule()
    {
        $this->player[] = new PokerCards("4", "♣", 4);
        $this->player[] = new PokerCards("5", "♣", 5);

        $this->board[] = new PokerCards("6", "♣", 6);
        $this->board[] = new PokerCards("7", "♣", 7);
        $this->board[] = new PokerCards("8", "♣", 8);

        $die = new PokerRules();
        $allCards = $die->pushToValueCards($this->player, $this->board);
        $result = $die->straightFlush($allCards);
        $this->assertTrue($result[0]);


        $this->playerHighCard[] = new PokerCards("2", "♣", 2);
        $this->playerHighCard[] = new PokerCards("4", "♦", 4);

        $this->boardHighCard[] = new PokerCards("8", "♦", 8);
        $this->boardHighCard[] = new PokerCards("J", "♥", 11);
        $this->boardHighCard[] = new PokerCards("K", "♦", 13);
        $this->boardHighCard[] = new PokerCards("A", "♠", 14);
        $this->boardHighCard[] = new PokerCards("9", "♥", 9);

        $allCardsNoPair = $die->pushToValueCards($this->playerHighCard, $this->boardHighCard);
        $result = $die->straightFlush($allCardsNoPair);
        $this->assertFalse($result[0]);
        
    }

    public function testRoyalFlushRule()
    {
        $this->player[] = new PokerCards("10", "♣", 10);
        $this->player[] = new PokerCards("J", "♣", 11);

        $this->board[] = new PokerCards("K", "♣", 12);
        $this->board[] = new PokerCards("Q", "♣", 13);
        $this->board[] = new PokerCards("A", "♣", 14);

        $die = new PokerRules();
        $allCards = $die->pushToValueCards($this->player, $this->board);
        $result = $die->royalFlush($allCards);
        $this->assertTrue($result[0]);


        $this->playerHighCard[] = new PokerCards("2", "♣", 2);
        $this->playerHighCard[] = new PokerCards("4", "♦", 4);

        $this->boardHighCard[] = new PokerCards("8", "♦", 8);
        $this->boardHighCard[] = new PokerCards("J", "♥", 11);
        $this->boardHighCard[] = new PokerCards("K", "♦", 13);
        $this->boardHighCard[] = new PokerCards("A", "♠", 14);
        $this->boardHighCard[] = new PokerCards("9", "♥", 9);

        $allCardsNoPair = $die->pushToValueCards($this->playerHighCard, $this->boardHighCard);
        $result = $die->royalFlush($allCardsNoPair);
        $this->assertFalse($result[0]);
        
    }
}
