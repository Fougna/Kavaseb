<?php

namespace App\Controller;

use App\Entity\Realisateur;
use App\Form\RealisateurType;
use App\Repository\RealisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/realisateur")
 */
class AdminRealisateurController extends AbstractController
{
    /**
     * @Route("/", name="admin_realisateur_index", methods={"GET"})
     */
    public function index(RealisateurRepository $realisateurRepository): Response
    {
        return $this->render('admin_realisateur/index.html.twig', [
            'realisateurs' => $realisateurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_realisateur_new", methods={"GET", "POST"})
     */
    public function new(Request $request, RealisateurRepository $realisateurRepository): Response
    {
        $realisateur = new Realisateur();
        $form = $this->createForm(RealisateurType::class, $realisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $realisateurRepository->add($realisateur, true);

            return $this->redirectToRoute('admin_realisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_realisateur/new.html.twig', [
            'realisateur' => $realisateur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_realisateur_show", methods={"GET"})
     */
    public function show(Realisateur $realisateur): Response
    {
        return $this->render('admin_realisateur/show.html.twig', [
            'realisateur' => $realisateur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_realisateur_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Realisateur $realisateur, RealisateurRepository $realisateurRepository): Response
    {
        $form = $this->createForm(RealisateurType::class, $realisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $realisateurRepository->add($realisateur, true);

            return $this->redirectToRoute('admin_realisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_realisateur/edit.html.twig', [
            'realisateur' => $realisateur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_realisateur_delete", methods={"POST"})
     */
    public function delete(Request $request, Realisateur $realisateur, RealisateurRepository $realisateurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$realisateur->getId(), $request->request->get('_token'))) {
            $realisateurRepository->remove($realisateur, true);
        }

        return $this->redirectToRoute('admin_realisateur_index', [], Response::HTTP_SEE_OTHER);
    }
}
