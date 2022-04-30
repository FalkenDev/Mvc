<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Blackjack.
 */
class BlackjackTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties, use no arguments.
     */
    public function testCreateDeckForBlackjack()
    {
        $die = new Blackjack();
        $this->assertInstanceOf("\App\Card\Blackjack", $die);

        $res = $die->show_deck();
        $this->assertIsArray($res);
    }

    public function testPlayerGetsCards()
    {
        $die = new Blackjack();
        $res = $die->drawCardToPlayer(1);
        $this->assertNotEmpty($res);
    }

    public function testDealerGetsCards()
    {
        $die = new Blackjack();

        $res = $die->drawCardToDealer(1);
        $this->assertNotEmpty($res);
    }

    public function testDrawStandDealerWorks()
    {
        $die = new Blackjack();

        $res = $die->drawStandDealer();
        // Test if dealer draws cards after player standing
        $this->assertGreaterThanOrEqual(2, count($res));

        $dealerScore = $die->returnScore($res);

        // Test if dealer draws until he have score 17 or more
        $this->assertGreaterThanOrEqual(17, $dealerScore[0]);
    }

    public function testReturnScoreAceWorks()
    {
        $die = new Blackjack();
        $score = 13;
        $ace = 1;

        // Gives score 13 and have 1 ace
        $totalScoreAfterAce = $die->returnScoreAce($score, $ace);

        // Test if score
        $this->assertLessThan(13, $totalScoreAfterAce);
    }

    public function testReturnScoreWorks()
    {
        $die = new Blackjack();
        $res = $die->drawCardToPlayer(2);
        $res = $die->returnScore($res);
        $this->assertNotEmpty($res);
    }

    public function testCheckBustWorks()
    {
        $die = new Blackjack();
        $res = $die->checkBust([22, 22]);
        $this->assertTrue($res);
    }

    public function testHasAce()
    {
        $die = new Blackjack();
        $cardHand = $die->draw(3);
        $ace = new Cards("A", "♥");
        array_push($cardHand, $ace);
        $res = $die->hasAce($cardHand);
        $this->assertTrue($res);
    }

    public function testCheckWinnerRetrurnsString()
    {
        $die = new Blackjack();
        $playerHand = $die->drawCardToPlayer(2);

        $dealerHand = $die->drawCardToDealer(2);

        $res = $die->checkWinner($playerHand, $dealerHand);
        $this->assertStringEndsWith("against the dealer!", $res);
    }
}
