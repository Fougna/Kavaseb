<?php

namespace App\Controller;

use App\Entity\Film;
use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/film/liste")
 */
class FilmListeController extends AbstractController
{
    /**
     * @Route("/", name="film_liste_index", methods={"GET"})
     */
    public function index(FilmRepository $filmRepository): Response
    {
        return $this->render('film_liste/index.html.twig', [
            'films' => $filmRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="film_liste_show", methods={"GET"})
     */
    public function show(Film $film): Response
    {
        return $this->render('film_liste/show.html.twig', [
            'film' => $film,
        ]);
    }
}