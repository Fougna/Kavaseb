<?php

namespace App\Controller;

use App\Entity\Morceau;
use App\Form\MorceauType;
use App\Repository\MorceauRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/morceau")
 */
class AdminMorceauController extends AbstractController
{
    /**
     * @Route("/", name="admin_morceau_index", methods={"GET"})
     */
    public function index(MorceauRepository $morceauRepository): Response
    {
        return $this->render('admin_morceau/index.html.twig', [
            'morceaus' => $morceauRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_morceau_new", methods={"GET", "POST"})
     */
    public function new(Request $request, MorceauRepository $morceauRepository): Response
    {
        $morceau = new Morceau();
        $form = $this->createForm(MorceauType::class, $morceau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $morceauRepository->add($morceau, true);

            return $this->redirectToRoute('admin_morceau_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_morceau/new.html.twig', [
            'morceau' => $morceau,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_morceau_show", methods={"GET"})
     */
    public function show(Morceau $morceau): Response
    {
        return $this->render('admin_morceau/show.html.twig', [
            'morceau' => $morceau,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_morceau_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Morceau $morceau, MorceauRepository $morceauRepository): Response
    {
        $form = $this->createForm(MorceauType::class, $morceau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $morceauRepository->add($morceau, true);

            return $this->redirectToRoute('admin_morceau_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_morceau/edit.html.twig', [
            'morceau' => $morceau,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_morceau_delete", methods={"POST"})
     */
    public function delete(Request $request, Morceau $morceau, MorceauRepository $morceauRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$morceau->getId(), $request->request->get('_token'))) {
            $morceauRepository->remove($morceau, true);
        }

        return $this->redirectToRoute('admin_morceau_index', [], Response::HTTP_SEE_OTHER);
    }
}
