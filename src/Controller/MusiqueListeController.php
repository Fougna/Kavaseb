<?php

namespace App\Controller;

use App\Entity\Musique;
use App\Repository\MusiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/musique/liste")
 */
class MusiqueListeController extends AbstractController
{
    /**
     * @Route("/", name="musique_liste_index", methods={"GET"})
     */
    public function index(MusiqueRepository $musiqueRepository): Response
    {
        return $this->render('musique_liste/index.html.twig', [
            'musiques' => $musiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="musique_liste_show", methods={"GET"})
     */
    public function show(Musique $musique): Response
    {
        return $this->render('musique_liste/show.html.twig', [
            'musique' => $musique,
        ]);
    }
}