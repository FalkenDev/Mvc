<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
/** @SuppressWarnings(PHPMD) */
class GameControllerTwig extends AbstractController
{
    /**
     * @Route(
     *      "/game/doc",
     *      name="game-document",
     *      methods={"GET","HEAD"}
     * )
     */
    public function gameDoc(): Response
    {
        return $this->render('doc.html.twig');
    }

    /**
     * @Route(
     *      "/game/start",
     *      name="blackjack-info",
     *      methods={"GET","HEAD"}
     * )
     */
    public function blackjackStart(): Response
    {
        return $this->render('information.html.twig');
    }

    /**
     * @Route(
     *      "/game/blackjack",
     *      name="blackjack-game",
     *      methods={"GET","HEAD"}
     * )
     */
    public function blackjackGame(
        Request $request,
        SessionInterface $session
    ): Response {
        $die = $session->get("blackjack") ?? new \App\Card\Blackjack();

        // Get sessions if not exists then give the variable a empty array
        $playerHand = $session->get("playerHand") ?? [];
        $playerScore = $die->returnScore($playerHand);
        $bust = $die->checkBust($playerScore);

        $dealerHand = $session->get("dealerHand") ?? [];
        $dealerScore = $die->returnScore($dealerHand);

        $winner = $session->get("winner") ?? "";
        $this->addFlash("Winner", $winner);
        if ($bust) {
            $this->addFlash("Bust", "You have BUST, Dealer wins!");
        }

        $data = [
            'playerHand' => $playerHand,
            'playerScore' => $playerScore,
            'dealerHand' => $dealerHand,
            'dealerScore' => $dealerScore,
            'draws' => count($die->show_deck()),
            'stand' => $session->get("stand") ?? false,
            'bust' => $bust
        ];

        return $this->render('game/game.html.twig', $data);
    }

    /**
     * @Route(
     *      "/game/blackjack",
     *      name="blackjack-game-process",
     *      methods={"POST"}
     * )
     */
    public function blackjackGamepProcess(
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
}
