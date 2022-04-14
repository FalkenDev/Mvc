<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CardControllerTwig extends AbstractController
{
    /**
     * @Route("/card", name="card")
     */
    public function card(): Response
    {
        return $this->render('card.html.twig');
    }

    /**
     * @Route("/card/deck", name="deck")
     */
    public function deck(): Response
    {
        $die = new \App\Card\Deck();
        $die = $die->show_deck();
        $data = [
            'title' => "Deck of cards",
            'deck' => $die
        ];
        return $this->render('card/deck.html.twig', $data);
    }

    /**
     * @Route("/card/deck/draw", name="draw", methods={"GET","HEAD"})
     */
    public function draw(
        Request $request,
        SessionInterface $session
    ): Response {
        $numDraw = 1;
        $die = $session->get("deck") ?? new \App\Card\Deck();
        if (count($die->show_deck()) < 1)
        {
            $data = [
                'title' => "Deck of cards",
                'deck' => $session->get("draw"),
                'draws' => count($die->show_deck())
            ];
            return $this->render('card/draw.html.twig', $data);
        }

        $draw = $die->draw($numDraw);
        $session->set("deck", $die);
        $session->set("draw", $draw);

        $data = [
            'title' => "Deck of cards",
            'deck' => $draw,
            'draws' => count($die->show_deck())
        ];
        return $this->render('card/draw.html.twig', $data);
    }

    /**
     * @Route("/card/deck/draw/{numDraw}", name="draws", methods={"GET","HEAD"})
     */
    public function drawSelected(
        int $numDraw = 1,
        Request $request,
        SessionInterface $session
    ): Response {
        $die = $session->get("deck") ?? new \App\Card\Deck();
        if (count($die->show_deck()) < $numDraw )
        {
            $data = [
                'title' => "Deck of cards",
                'deck' => $session->get("draw"),
                'draws' => count($die->show_deck())
            ];
            return $this->render('card/draw.html.twig', $data);
        }

        $draw = $die->draw($numDraw);
        $session->set("deck", $die);
        $session->set("draw", $draw);

        $data = [
            'title' => "Deck of cards",
            'deck' => $draw,
            'draws' => count($die->show_deck())
        ];
        return $this->render('card/draw.html.twig', $data);
    }

    


    /**
     * @Route("/card/deck/shuffle", name="shuffle")
     */
    public function shuffle(
        Request $request,
        SessionInterface $session
    ): Response {
        $session->clear();
        $die = $session->get("deck") ?? new \App\Card\Deck();
        $die = $die->shuffle_deck();
        $data = [
            'title' => "Deck of cards",
            'deck' => $die
        ];
        return $this->render('card/shuffle.html.twig', $data);
    }
}