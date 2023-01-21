<?php

namespace App\Controller;

use App\Entity\Compositeur;
use App\Form\CompositeurType;
use App\Repository\CompositeurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/compositeur")
 */
class AdminCompositeurController extends AbstractController
{
    /**
     * @Route("/", name="admin_compositeur_index", methods={"GET"})
     */
    public function index(CompositeurRepository $compositeurRepository): Response
    {
        return $this->render('admin_compositeur/index.html.twig', [
            'compositeurs' => $compositeurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_compositeur_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CompositeurRepository $compositeurRepository): Response
    {
        $compositeur = new Compositeur();
        $form = $this->createForm(CompositeurType::class, $compositeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $compositeurRepository->add($compositeur, true);

            return $this->redirectToRoute('admin_compositeur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_compositeur/new.html.twig', [
            'compositeur' => $compositeur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_compositeur_show", methods={"GET"})
     */
    public function show(Compositeur $compositeur): Response
    {
        return $this->render('admin_compositeur/show.html.twig', [
            'compositeur' => $compositeur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_compositeur_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Compositeur $compositeur, CompositeurRepository $compositeurRepository): Response
    {
        $form = $this->createForm(CompositeurType::class, $compositeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $compositeurRepository->add($compositeur, true);

            return $this->redirectToRoute('admin_compositeur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_compositeur/edit.html.twig', [
            'compositeur' => $compositeur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_compositeur_delete", methods={"POST"})
     */
    public function delete(Request $request, Compositeur $compositeur, CompositeurRepository $compositeurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$compositeur->getId(), $request->request->get('_token'))) {
            $compositeurRepository->remove($compositeur, true);
        }

        return $this->redirectToRoute('admin_compositeur_index', [], Response::HTTP_SEE_OTHER);
    }
}
