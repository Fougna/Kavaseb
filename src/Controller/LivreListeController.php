<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/livre/liste")
 */
class LivreListeController extends AbstractController
{
    /**
     * @Route("/", name="livre_liste_index", methods={"GET"})
     */
    public function index(LivreRepository $livreRepository): Response
    {
        return $this->render('livre_liste/index.html.twig', [
            'livres' => $livreRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="livre_liste_show", methods={"GET"})
     */
    public function show(Livre $livre): Response
    {
        return $this->render('livre_liste/show.html.twig', [
            'livre' => $livre,
        ]);
    }
}