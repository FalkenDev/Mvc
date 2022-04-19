<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class GameControllerTwig extends AbstractController
{
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
    public function blackjackGame(): Response
    {
        return $this->render('game/game.html.twig');
    }
}