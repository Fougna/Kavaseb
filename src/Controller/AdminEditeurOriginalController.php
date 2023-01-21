<?php

namespace App\Controller;

use App\Entity\EditeurOriginal;
use App\Form\EditeurOriginalType;
use App\Repository\EditeurOriginalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/editeur/original")
 */
class AdminEditeurOriginalController extends AbstractController
{
    /**
     * @Route("/", name="admin_editeur_original_index", methods={"GET"})
     */
    public function index(EditeurOriginalRepository $editeurOriginalRepository): Response
    {
        return $this->render('admin_editeur_original/index.html.twig', [
            'editeur_originals' => $editeurOriginalRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_editeur_original_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EditeurOriginalRepository $editeurOriginalRepository): Response
    {
        $editeurOriginal = new EditeurOriginal();
        $form = $this->createForm(EditeurOriginalType::class, $editeurOriginal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $editeurOriginalRepository->add($editeurOriginal, true);

            return $this->redirectToRoute('admin_editeur_original_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_editeur_original/new.html.twig', [
            'editeur_original' => $editeurOriginal,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_editeur_original_show", methods={"GET"})
     */
    public function show(EditeurOriginal $editeurOriginal): Response
    {
        return $this->render('admin_editeur_original/show.html.twig', [
            'editeur_original' => $editeurOriginal,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_editeur_original_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, EditeurOriginal $editeurOriginal, EditeurOriginalRepository $editeurOriginalRepository): Response
    {
        $form = $this->createForm(EditeurOriginalType::class, $editeurOriginal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $editeurOriginalRepository->add($editeurOriginal, true);

            return $this->redirectToRoute('admin_editeur_original_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_editeur_original/edit.html.twig', [
            'editeur_original' => $editeurOriginal,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_editeur_original_delete", methods={"POST"})
     */
    public function delete(Request $request, EditeurOriginal $editeurOriginal, EditeurOriginalRepository $editeurOriginalRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$editeurOriginal->getId(), $request->request->get('_token'))) {
            $editeurOriginalRepository->remove($editeurOriginal, true);
        }

        return $this->redirectToRoute('admin_editeur_original_index', [], Response::HTTP_SEE_OTHER);
    }
}
