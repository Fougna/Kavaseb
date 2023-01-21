<?php

namespace App\Controller;

use App\Entity\Traducteur;
use App\Form\TraducteurType;
use App\Repository\TraducteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/traducteur")
 */
class AdminTraducteurController extends AbstractController
{
    /**
     * @Route("/", name="admin_traducteur_index", methods={"GET"})
     */
    public function index(TraducteurRepository $traducteurRepository): Response
    {
        return $this->render('admin_traducteur/index.html.twig', [
            'traducteurs' => $traducteurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_traducteur_new", methods={"GET", "POST"})
     */
    public function new(Request $request, TraducteurRepository $traducteurRepository): Response
    {
        $traducteur = new Traducteur();
        $form = $this->createForm(TraducteurType::class, $traducteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $traducteurRepository->add($traducteur, true);

            return $this->redirectToRoute('admin_traducteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_traducteur/new.html.twig', [
            'traducteur' => $traducteur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_traducteur_show", methods={"GET"})
     */
    public function show(Traducteur $traducteur): Response
    {
        return $this->render('admin_traducteur/show.html.twig', [
            'traducteur' => $traducteur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_traducteur_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Traducteur $traducteur, TraducteurRepository $traducteurRepository): Response
    {
        $form = $this->createForm(TraducteurType::class, $traducteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $traducteurRepository->add($traducteur, true);

            return $this->redirectToRoute('admin_traducteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_traducteur/edit.html.twig', [
            'traducteur' => $traducteur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_traducteur_delete", methods={"POST"})
     */
    public function delete(Request $request, Traducteur $traducteur, TraducteurRepository $traducteurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$traducteur->getId(), $request->request->get('_token'))) {
            $traducteurRepository->remove($traducteur, true);
        }

        return $this->redirectToRoute('admin_traducteur_index', [], Response::HTTP_SEE_OTHER);
    }
}
