<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Player;
use App\Repository\PlayerRepository;

class PokerControllerTwig extends AbstractController
{
    /**
     * @Route(
     *      "/game/poker",
     *      name="poker-info",
     *      methods={"GET","HEAD"}
     * )
     */
    public function PokerStart(
        ManagerRegistry $doctrine,
    ): Response
    {
        $entityManager = $doctrine->getManager();
        $player = $entityManager->getRepository(Player::class)->find(1);
        if (!$player) {
            $player = new Player();
            $player->setBalance(1000);
            $entityManager->persist($player);
            $entityManager->flush();
        }
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
        SessionInterface $session,
        ManagerRegistry $doctrine
    ): Response {
        $die = $session->get("poker") ?? new \App\Poker\Poker();
        $rules = new \App\Poker\PokerRules();
        $entityManager = $doctrine->getManager();
        $player = $entityManager->getRepository(Player::class)->find(1);
        print_r($die->checkWinner(50));
        $data = [
            'playerHand' => $die->get_PlayerCards(),
            'playerScore' => $rules->checkAllRules($die->get_PlayerCards(), $die->get_BoardCards())[0],
            'dealerHand' => $die->get_DealerCards(),
            'board' => $die->get_BoardCards(),
            'balance' => $player->getBalance(),
            'winBalance' => $session->get("winning") ?? 0
        ];

        return $this->render('project/poker/poker.html.twig', $data);
    }

    /**
     * @Route(
     *      "/game/poker/start",
     *      name="poker-game-process",
     *      methods={"POST"}
     * )
     */
    public function pokerGamepProcess(
        Request $request,
        SessionInterface $session,
        ManagerRegistry $doctrine,
    ): Response {
        $entityManager = $doctrine->getManager();

        // Buttons in twig file
        $ante = $request->request->get('ante');
        $call = $request->request->get('call');
        $fold = $request->request->get('fold');

        // Get the Poker sessions if not exists then create new Poker
        $die = $session->get("poker") ?? new \App\Poker\Poker();

        // Get Player1
        $player = $entityManager->getRepository(Player::class)->find(1);

        // Get player balance
        $balance = $player->getBalance();

        // Buttons ( If press ante or call )
        if ($ante) {
            $player->setBalance($balance - 50);
            $entityManager->flush();
            $die->ante();
        } elseif ($call) {
            $player->setBalance($balance - 50);
            $entityManager->flush();
            $checkWinner = $die->call();

            if($checkWinner[0] === "same") { // If the dealer and player have the same card value
                $player->setBalance($balance + 100);
                $entityManager->flush();
                $session->set("winning", 100);

            } elseif ($checkWinner[0]) { // If the player wins
                $player->setBalance($balance + $checkWinner[2] + 150);
                $entityManager->flush();
                $session->set("winning", $checkWinner[2] + 150);
            }
        }
        // Set poker session
        $session->set("poker", $die);

        // If press fold / new game (clear all sessions)
        if ($fold) {
            $session->clear();
        }

        return $this->redirectToRoute('poker-game');
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