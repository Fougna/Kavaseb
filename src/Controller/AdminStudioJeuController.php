<?php

namespace App\Controller;

use App\Entity\StudioJeu;
use App\Form\StudioJeuType;
use App\Repository\StudioJeuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/studio/jeu")
 */
class AdminStudioJeuController extends AbstractController
{
    /**
     * @Route("/", name="admin_studio_jeu_index", methods={"GET"})
     */
    public function index(StudioJeuRepository $studioJeuRepository): Response
    {
        return $this->render('admin_studio_jeu/index.html.twig', [
            'studio_jeus' => $studioJeuRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_studio_jeu_new", methods={"GET", "POST"})
     */
    public function new(Request $request, StudioJeuRepository $studioJeuRepository): Response
    {
        $studioJeu = new StudioJeu();
        $form = $this->createForm(StudioJeuType::class, $studioJeu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $studioJeuRepository->add($studioJeu, true);

            return $this->redirectToRoute('admin_studio_jeu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_studio_jeu/new.html.twig', [
            'studio_jeu' => $studioJeu,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_studio_jeu_show", methods={"GET"})
     */
    public function show(StudioJeu $studioJeu): Response
    {
        return $this->render('admin_studio_jeu/show.html.twig', [
            'studio_jeu' => $studioJeu,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_studio_jeu_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, StudioJeu $studioJeu, StudioJeuRepository $studioJeuRepository): Response
    {
        $form = $this->createForm(StudioJeuType::class, $studioJeu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $studioJeuRepository->add($studioJeu, true);

            return $this->redirectToRoute('admin_studio_jeu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_studio_jeu/edit.html.twig', [
            'studio_jeu' => $studioJeu,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_studio_jeu_delete", methods={"POST"})
     */
    public function delete(Request $request, StudioJeu $studioJeu, StudioJeuRepository $studioJeuRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$studioJeu->getId(), $request->request->get('_token'))) {
            $studioJeuRepository->remove($studioJeu, true);
        }

        return $this->redirectToRoute('admin_studio_jeu_index', [], Response::HTTP_SEE_OTHER);
    }
}
