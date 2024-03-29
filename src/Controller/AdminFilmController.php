<?php

namespace App\Controller;

use App\Entity\Film;
use App\Form\FilmType;
use App\Service\FileUploader;
use App\Repository\FilmRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/film")
 */
class AdminFilmController extends AbstractController
{
    /**
     * @Route("/", name="admin_film_index", methods={"GET"})
     */
    public function index(FilmRepository $filmRepository): Response
    {
        return $this->render('admin_film/index.html.twig', [
            'films' => $filmRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_film_new", methods={"GET", "POST"})
     */
    public function new(Request $request, FilmRepository $filmRepository, FileUploader $fileUploader): Response
    {
        $film = new Film();
        $form = $this->createForm(FilmType::class, $film);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile)
            {
                $imageFileName = $fileUploader->upload($imageFile);
                $film->setImage($imageFileName);
            }

            $artFile = $form->get('art')->getData();
            if ($artFile)
            {
                $artFileName = $fileUploader->upload($artFile);
                $film->setArt($artFileName);
            }

            $filmRepository->add($film, true);

            return $this->redirectToRoute('admin_film_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_film/new.html.twig', [
            'film' => $film,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_film_show", methods={"GET"})
     */
    public function show(Film $film): Response
    {
        return $this->render('admin_film/show.html.twig', [
            'film' => $film,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_film_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Film $film, FilmRepository $filmRepository, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(FilmType::class, $film);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile)
            {
                $imageFileName = $fileUploader->upload($imageFile);
                $film->setImage($imageFileName);
            }

            $artFile = $form->get('art')->getData();
            if ($artFile)
            {
                $artFileName = $fileUploader->upload($artFile);
                $film->setArt($artFileName);
            }
            
            $filmRepository->add($film, true);

            return $this->redirectToRoute('admin_film_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_film/edit.html.twig', [
            'film' => $film,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_film_delete", methods={"POST"})
     */
    public function delete(Request $request, Film $film, FilmRepository $filmRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$film->getId(), $request->request->get('_token'))) {
            $filmRepository->remove($film, true);
        }

        return $this->redirectToRoute('admin_film_index', [], Response::HTTP_SEE_OTHER);
    }
}
