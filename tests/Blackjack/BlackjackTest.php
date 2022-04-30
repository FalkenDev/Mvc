<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Blackjack.
 */
class BlackjackTest extends TestCase
{
    /**
     * Test to construct a deck.
     *
     * Look up if $die is an instance of \App\Card\Blackjack and $res is an array.
     */
    public function testCreateDeckForBlackjack()
    {
        $die = new Blackjack();
        $this->assertInstanceOf("\App\Card\Blackjack", $die);

        $res = $die->show_deck();
        $this->assertIsArray($res);
    }

    /**
     * Test drawCardToPlayer method work.
     *
     * Look up if $res is not empty.
     */
    public function testPlayerGetsCards()
    {
        $die = new Blackjack();
        $res = $die->drawCardToPlayer(1);
        $this->assertNotEmpty($res);
    }

    /**
     * Test drawCardToDealer method work.
     *
     * Look up if $res is not empty.
     */
    public function testDealerGetsCards()
    {
        $die = new Blackjack();

        $res = $die->drawCardToDealer(1);
        $this->assertNotEmpty($res);
    }

    /**
     * Test drawStandDealer method work.
     *
     * Look up if the array $res is bigger or equal to 2.
     *
     * Look if dealer draws until he have score 17 or
     * more ($dealerScore need to be bigger or equal to 17).
     */
    public function testDrawStandDealerWorks()
    {
        $die = new Blackjack();

        $res = $die->drawStandDealer();
        $this->assertGreaterThanOrEqual(2, count($res));

        $dealerScore = $die->returnScore($res);
        $this->assertGreaterThanOrEqual(17, $dealerScore[0]);
    }

    /**
     * Test returnScoreAce method work.
     * Input score 13 and have 1 ace into returnScoreAce method.
     *
     * Look up if $totalScoreAfterAce is less then 13.
     */
    public function testReturnScoreAceWorks()
    {
        $die = new Blackjack();
        $score = 13;
        $ace = 1;

        $totalScoreAfterAce = $die->returnScoreAce($score, $ace);

        // Test if score
        $this->assertLessThan(13, $totalScoreAfterAce);
    }

    /**
     * Test returnScore method work.
     * Draw 2 cards then insert it into returnScore method.
     *
     * Look up if $res is not empty.
     */
    public function testReturnScoreWorks()
    {
        $die = new Blackjack();
        $res = $die->draw(2);
        $res = $die->returnScore($res);
        $this->assertNotEmpty($res);
    }

    /**
     * Test checkBust method work.
     * Input array [22, 22] into checkBust method.
     *
     * Look up $res is true
     */
    public function testCheckBustWorks()
    {
        $die = new Blackjack();
        $res = $die->checkBust([22, 22]);
        $this->assertTrue($res);
    }

    /**
     * Test hasAce method work.
     * Draw 3 cards then push a ace ("A") into the $cardHand array.
     * Input $cardHand into hasAce method.
     *
     * Look up $res is true.
     */
    public function testHasAce()
    {
        $die = new Blackjack();
        $cardHand = $die->draw(3);
        $ace = new Cards("A", "♥");
        array_push($cardHand, $ace);
        $res = $die->hasAce($cardHand);
        $this->assertTrue($res);
    }

    /**
     * Test checkWinner method work.
     * Draw 2 cards to playerHand and dealerHand.
     * Input playerHand and dealerHand to checkWinner method.
     *
     * Look up if the string ends with against the dealer! in $res.
     */
    public function testCheckWinnerRetrurnsString()
    {
        $die = new Blackjack();
        $playerHand = $die->drawCardToPlayer(2);

        $dealerHand = $die->drawCardToDealer(2);

        $res = $die->checkWinner($playerHand, $dealerHand);
        $this->assertStringEndsWith("against the dealer!", $res);
    }
}
