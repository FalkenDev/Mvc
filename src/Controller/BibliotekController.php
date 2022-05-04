<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Bibliotek;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\BibliotekRepository;

class BibliotekController extends AbstractController
{
    #[Route('/bibliotek/app', name: 'app_bibliotek')]
    public function index(): Response
    {
        return $this->render('bibliotek/index.html.twig', [
            'controller_name' => 'BibliotekController',
        ]);
    }

    /**
     * @Route(
     *      "/bibliotek",
     *      name="bibliotek-home",
     *      methods={"GET","HEAD"}
     * )
     */
    public function home(): Response
    {
        return $this->render('bibliotek.html.twig');
    }

    /**
     * @Route(
     *      "/bibliotek/create",
     *      name="bibliotek-create",
     *      methods={"GET","HEAD"}
     * )
     */
    public function create(): Response
    {
        return $this->render('bibliotek/createbook.html.twig');
    }

    /**
     * @Route(
     *      "/bibliotek/create",
     *      name="bibliotek-create-process",
     *      methods={"POST"}
     * )
     */
    public function createProcess(
        Request $request,
        ManagerRegistry $doctrine
    ): Response {
        $entityManager = $doctrine->getManager();

        $book = new Bibliotek();
        $book->setTitel($request->request->get('titel'));
        $book->setForfattare($request->request->get('forfattare'));
        $book->setIsbn($request->request->get('isbn'));
        $book->setUrlbild($request->request->get('urlbild'));

        $entityManager->persist($book);

        $entityManager->flush();

        return $this->redirectToRoute('bibliotek-read-all');
    }

    /**
     * @Route(
     *      "/bibliotek/read/{id}",
     *      name="bibliotek-read-one",
     *      methods={"GET","HEAD"}
     * )
     */
    public function readOne(
        ManagerRegistry $doctrine,
        int $id
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Bibliotek::class)->find($id);
        $data = [
            'book' => $book
        ];
        return $this->render('bibliotek/infobook.html.twig', $data);
    }

    /**
     * @Route(
     *      "/bibliotek/read",
     *      name="bibliotek-read-all",
     *      methods={"GET","HEAD"}
     * )
     */
    public function readAll(
        BibliotekRepository $bibliotekRepository
    ): Response {
        $bibliotek = $bibliotekRepository
            ->findAll();
        $data = [
            'bibliotek' => $bibliotek
        ];

        return $this->render('bibliotek/readbook.html.twig', $data);
    }

    /**
     * @Route(
     *      "/bibliotek/update/{id}",
     *      name="bibliotek-update",
     *      methods={"GET","HEAD"}
     * )
     */
    public function update(
        ManagerRegistry $doctrine,
        int $id
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Bibliotek::class)->find($id);

        if (!$book) {
            throw $this->createNotFoundException(
                'No book found in Biblioteket id ' . $id
            );
        }

        $data = [
            'book' => $book
        ];

        return $this->render('bibliotek/updatebook.html.twig', $data);
    }

    /**
     * @Route(
     *      "/bibliotek/update/{id}",
     *      name="bibliotek-update-process",
     *      methods={"POST"}
     * )
     */
    public function updateProcess(
        Request $request,
        ManagerRegistry $doctrine,
        int $id
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Bibliotek::class)->find($id);

        $book->setTitel($request->request->get('titel'));
        $book->setForfattare($request->request->get('forfattare'));
        $book->setIsbn($request->request->get('isbn'));
        $book->setUrlbild($request->request->get('urlbild'));
        $entityManager->flush();

        return $this->redirectToRoute('bibliotek-read-all');
    }

    /**
     * @Route(
     *      "/bibliotek/delete/{id}",
     *      name="bibliotek-delete",
     *      methods={"GET"}
     * )
     */
    public function delete(
        ManagerRegistry $doctrine,
        int $id
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Bibliotek::class)->find($id);

        if (!$book) {
            throw $this->createNotFoundException(
                'No book found in Biblioteket for id ' . $id
            );
        }

        $entityManager->remove($book);
        $entityManager->flush();

        return $this->redirectToRoute('bibliotek-read-all');
    }
}
