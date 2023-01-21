<?php

namespace App\Controller;

use App\Entity\Acteur;
use App\Form\ActeurType;
use App\Repository\ActeurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/acteur")
 */
class AdminActeurController extends AbstractController
{
    /**
     * @Route("/", name="admin_acteur_index", methods={"GET"})
     */
    public function index(ActeurRepository $acteurRepository): Response
    {
        return $this->render('admin_acteur/index.html.twig', [
            'acteurs' => $acteurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_acteur_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ActeurRepository $acteurRepository): Response
    {
        $acteur = new Acteur();
        $form = $this->createForm(ActeurType::class, $acteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $acteurRepository->add($acteur, true);

            return $this->redirectToRoute('admin_acteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_acteur/new.html.twig', [
            'acteur' => $acteur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_acteur_show", methods={"GET"})
     */
    public function show(Acteur $acteur): Response
    {
        return $this->render('admin_acteur/show.html.twig', [
            'acteur' => $acteur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_acteur_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Acteur $acteur, ActeurRepository $acteurRepository): Response
    {
        $form = $this->createForm(ActeurType::class, $acteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $acteurRepository->add($acteur, true);

            return $this->redirectToRoute('admin_acteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_acteur/edit.html.twig', [
            'acteur' => $acteur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_acteur_delete", methods={"POST"})
     */
    public function delete(Request $request, Acteur $acteur, ActeurRepository $acteurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$acteur->getId(), $request->request->get('_token'))) {
            $acteurRepository->remove($acteur, true);
        }

        return $this->redirectToRoute('admin_acteur_index', [], Response::HTTP_SEE_OTHER);
    }
}
