<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class JsonCardControllerTwig
{
    /**
     * @Route("card/api/deck", name="apiDeck")
     */
    public function deckToJson(): Response
    {
        $die = new \App\Card\Deck();
        $die = $die->show_deck();

        $data = [
            'title' => "Deck to JSON",
            'deck' => $die
        ];

        //$response = new Response();
        $response = new JsonResponse($data);
        $response->setEncodingOptions($response->getEncodingOptions() | JSON_UNESCAPED_UNICODE);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}