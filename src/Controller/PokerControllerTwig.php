<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PokerControllerTwig extends AbstractController
{
    /**
     * @Route(
     *      "/game/poker",
     *      name="poker-info",
     *      methods={"GET","HEAD"}
     * )
     */
    public function PokerStart(): Response
    {
        return $this->render('project/poker/info.html.twig');
    }

    /**
     * @Route(
     *      "/game/poker/start",
     *      name="poker-game",
     *      methods={"GET","HEAD"}
     * )
     */
    public function pokerGame(
        Request $request,
        SessionInterface $session
    ): Response {
        $die = $session->get("poker") ?? new \App\Poker\Poker();

        // Get sessions if not exists then give the variable a empty array
        $playerHand = $session->get("playerHand") ?? $die->drawCardToPlayer(2);
        $dealerHand = $session->get("dealerHand") ?? $die->drawCardToDealer(2);
        $board = $session->get("board") ?? $die->drawCardToBoard(5);

        $data = [
            'playerHand' => $playerHand,
            'playerScore' => "0",
            'dealerHand' => $dealerHand,
            'board' => $board,
            'balance' => "1000",
            'winBalance' => "0"
        ];

        return $this->render('project/poker/poker.html.twig', $data);
    }

    /**
     * @Route(
     *      "/game/blackjack",
     *      name="poker-game-process",
     *      methods={"POST"}
     * )
     */
    public function pokerGamepProcess(
        Request $request,
        SessionInterface $session
    ): Response {
        // Buttons
        $hit = $request->request->get('hit');
        $stand = $request->request->get('stand');
        $clear = $request->request->get('clear');

        // Get the Blackjack sessions if not exists then create new Blackjack
        $die = $session->get("blackjack") ?? new \App\Card\Blackjack();

        // Get the sessions if not exists then draw cards for both dealer and player
        $playerHand = $session->get("playerHand") ?? $die->drawCardToPlayer(1);
        $dealerHand = $session->get("dealerHand") ?? $die->drawCardToDealer(1);

        // Buttons ( If press hit or stand )
        if ($hit) {
            $playerHand = $die->drawCardToPlayer(1);
        } elseif ($stand) {
            $dealerHand = $die->drawStandDealer();
            $session->set("winner", $die->checkWinner($playerHand, $dealerHand));
            $session->set("stand", true);
        }

        // Set all the sessions
        $session->set("playerHand", $playerHand);
        $session->set("dealerHand", $dealerHand);
        $session->set("blackjack", $die);

        if ($clear) {
            $session->clear();
        }

        return $this->redirectToRoute('blackjack-game');
    }

    /**
     * @Route(
     *      "/proj/reset",
     *      name="project-reset-database",
     *      methods={"GET","HEAD"}
     * )
     */
    public function resetDatabase(): Response
    {
        return $this->render('project/pabout.html.twig');
    }
}