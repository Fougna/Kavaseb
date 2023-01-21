<?php

namespace App\Controller;

use App\Entity\EditeurFrancais;
use App\Form\EditeurFrancaisType;
use App\Repository\EditeurFrancaisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/editeur/francais")
 */
class AdminEditeurFrancaisController extends AbstractController
{
    /**
     * @Route("/", name="admin_editeur_francais_index", methods={"GET"})
     */
    public function index(EditeurFrancaisRepository $editeurFrancaisRepository): Response
    {
        return $this->render('admin_editeur_francais/index.html.twig', [
            'editeur_francais' => $editeurFrancaisRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_editeur_francais_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EditeurFrancaisRepository $editeurFrancaisRepository): Response
    {
        $editeurFrancai = new EditeurFrancais();
        $form = $this->createForm(EditeurFrancaisType::class, $editeurFrancai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $editeurFrancaisRepository->add($editeurFrancai, true);

            return $this->redirectToRoute('admin_editeur_francais_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_editeur_francais/new.html.twig', [
            'editeur_francai' => $editeurFrancai,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_editeur_francais_show", methods={"GET"})
     */
    public function show(EditeurFrancais $editeurFrancai): Response
    {
        return $this->render('admin_editeur_francais/show.html.twig', [
            'editeur_francai' => $editeurFrancai,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_editeur_francais_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, EditeurFrancais $editeurFrancai, EditeurFrancaisRepository $editeurFrancaisRepository): Response
    {
        $form = $this->createForm(EditeurFrancaisType::class, $editeurFrancai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $editeurFrancaisRepository->add($editeurFrancai, true);

            return $this->redirectToRoute('admin_editeur_francais_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_editeur_francais/edit.html.twig', [
            'editeur_francai' => $editeurFrancai,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_editeur_francais_delete", methods={"POST"})
     */
    public function delete(Request $request, EditeurFrancais $editeurFrancai, EditeurFrancaisRepository $editeurFrancaisRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$editeurFrancai->getId(), $request->request->get('_token'))) {
            $editeurFrancaisRepository->remove($editeurFrancai, true);
        }

        return $this->redirectToRoute('admin_editeur_francais_index', [], Response::HTTP_SEE_OTHER);
    }
}
