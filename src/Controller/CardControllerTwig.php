<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        $die->decks();
        $die = $die->show_deck();
        $data = [
            'title' => "Deck of cards",
            'deck' => $die
        ];
        return $this->render('card/deck.html.twig', $data);
    }

    /**
     * @Route("/card/deck/draw", name="draw")
     */
    public function draw(): Response
    {
        return $this->render('card/draw.html.twig');
    }

    /**
     * @Route("/card/deck/shuffle", name="shuffle")
     */
    public function shuffle(): Response
    {
        return $this->render('card/shuffle.html.twig');
    }
}