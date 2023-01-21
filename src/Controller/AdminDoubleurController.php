<?php

namespace App\Controller;

use App\Entity\Doubleur;
use App\Form\DoubleurType;
use App\Repository\DoubleurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/doubleur")
 */
class AdminDoubleurController extends AbstractController
{
    /**
     * @Route("/", name="admin_doubleur_index", methods={"GET"})
     */
    public function index(DoubleurRepository $doubleurRepository): Response
    {
        return $this->render('admin_doubleur/index.html.twig', [
            'doubleurs' => $doubleurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_doubleur_new", methods={"GET", "POST"})
     */
    public function new(Request $request, DoubleurRepository $doubleurRepository): Response
    {
        $doubleur = new Doubleur();
        $form = $this->createForm(DoubleurType::class, $doubleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $doubleurRepository->add($doubleur, true);

            return $this->redirectToRoute('admin_doubleur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_doubleur/new.html.twig', [
            'doubleur' => $doubleur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_doubleur_show", methods={"GET"})
     */
    public function show(Doubleur $doubleur): Response
    {
        return $this->render('admin_doubleur/show.html.twig', [
            'doubleur' => $doubleur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_doubleur_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Doubleur $doubleur, DoubleurRepository $doubleurRepository): Response
    {
        $form = $this->createForm(DoubleurType::class, $doubleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $doubleurRepository->add($doubleur, true);

            return $this->redirectToRoute('admin_doubleur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_doubleur/edit.html.twig', [
            'doubleur' => $doubleur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_doubleur_delete", methods={"POST"})
     */
    public function delete(Request $request, Doubleur $doubleur, DoubleurRepository $doubleurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$doubleur->getId(), $request->request->get('_token'))) {
            $doubleurRepository->remove($doubleur, true);
        }

        return $this->redirectToRoute('admin_doubleur_index', [], Response::HTTP_SEE_OTHER);
    }
}
