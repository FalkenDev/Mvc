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
            'title' => "Whole deck",
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
        if (count($die->show_deck()) < 1) {
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
            'deck' => $draw,
            'draws' => count($die->show_deck())
        ];
        return $this->render('card/draw.html.twig', $data);
    }

    /**
     * @Route("/card/deck/draw/{numDraw}", name="drawSelected", methods={"GET","HEAD"})
     */
    public function drawSelected(
        Request $request,
        SessionInterface $session,
        int $numDraw = 1,
    ): Response {
        $die = $session->get("deck") ?? new \App\Card\Deck();
        if (count($die->show_deck()) < $numDraw) {
            $data = [
                'deck' => $session->get("draw"),
                'draws' => count($die->show_deck())
            ];
            return $this->render('card/draw.html.twig', $data);
        }

        $draw = $die->draw($numDraw);
        $session->set("deck", $die);
        $session->set("draw", $draw);

        $data = [
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
            'deck' => $die
        ];
        return $this->render('card/shuffle.html.twig', $data);
    }


    /**
     * @Route("/card/deck/deal/{players}/{numCards}", name="deal")
     */
    public function deal(
        Request $request,
        SessionInterface $session,
        int $players = 1,
        int $numCards = 1
    ): Response {
        $die = new \App\Card\Deck();
        $pHands = [];
        for ($i = 0; $i < $players; $i++) {
            array_push($pHands, $die->draw($numCards));
        };

        $data = [
            'numPlayers' => $players,
            'pHands' => $pHands,
            'draws' => count($die->show_deck())
        ];
        return $this->render('card/cardplay.html.twig', $data);
    }

    /**
     * @Route("/card/deck2", name="deckWithJoker")
     */
    public function deck2(): Response
    {
        $die = new \App\Card\DeckWith2Jokers();
        $joker = $die->add2Joker();
        $die = $die->show_deck();
        for ($i = 0; $i < 2; $i++) {
            array_push($die, $joker[$i]);
        }
        $data = [
            'title' => "Whole deck with 2 jokers",
            'deck' => $die
        ];
        return $this->render('card/deck.html.twig', $data);
    }
}
