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
        $rules = new \App\Poker\PokerRules();
        //print_r($rules->checkAllRules($session->get("playerHand"), $session->get("board")));
        //$test = array_values($session->get("board") ?? []);
        //print_r($test);

        $data = [
            'playerHand' => $die->get_PlayerCards(),
            'playerScore' => "0",
            'dealerHand' => $die->get_DealerCards(),
            'board' => $die->get_BoardCards(),
            'balance' => "1000",
            'winBalance' => "0"
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
        SessionInterface $session
    ): Response {
        // Buttons
        $ante = $request->request->get('ante');
        $call = $request->request->get('call');
        $fold = $request->request->get('fold');

        // Get the Poker sessions if not exists then create new Poker
        $die = $session->get("poker") ?? new \App\Poker\Poker();

        // Buttons ( If press ante or call )
        if ($ante) {
            $die->ante();
        } elseif ($call) {
            $die->call();
            $die->checkWinner();
        }

        // Set poker session
        $session->set("poker", $die);

        // If fold cleaer poker session
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