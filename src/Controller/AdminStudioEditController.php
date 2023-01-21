<?php

namespace App\Controller;

use App\Entity\StudioEdit;
use App\Form\StudioEditType;
use App\Repository\StudioEditRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/studio/edit")
 */
class AdminStudioEditController extends AbstractController
{
    /**
     * @Route("/", name="admin_studio_edit_index", methods={"GET"})
     */
    public function index(StudioEditRepository $studioEditRepository): Response
    {
        return $this->render('admin_studio_edit/index.html.twig', [
            'studio_edits' => $studioEditRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_studio_edit_new", methods={"GET", "POST"})
     */
    public function new(Request $request, StudioEditRepository $studioEditRepository): Response
    {
        $studioEdit = new StudioEdit();
        $form = $this->createForm(StudioEditType::class, $studioEdit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $studioEditRepository->add($studioEdit, true);

            return $this->redirectToRoute('admin_studio_edit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_studio_edit/new.html.twig', [
            'studio_edit' => $studioEdit,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_studio_edit_show", methods={"GET"})
     */
    public function show(StudioEdit $studioEdit): Response
    {
        return $this->render('admin_studio_edit/show.html.twig', [
            'studio_edit' => $studioEdit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_studio_edit_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, StudioEdit $studioEdit, StudioEditRepository $studioEditRepository): Response
    {
        $form = $this->createForm(StudioEditType::class, $studioEdit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $studioEditRepository->add($studioEdit, true);

            return $this->redirectToRoute('admin_studio_edit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_studio_edit/edit.html.twig', [
            'studio_edit' => $studioEdit,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_studio_edit_delete", methods={"POST"})
     */
    public function delete(Request $request, StudioEdit $studioEdit, StudioEditRepository $studioEditRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$studioEdit->getId(), $request->request->get('_token'))) {
            $studioEditRepository->remove($studioEdit, true);
        }

        return $this->redirectToRoute('admin_studio_edit_index', [], Response::HTTP_SEE_OTHER);
    }
}
