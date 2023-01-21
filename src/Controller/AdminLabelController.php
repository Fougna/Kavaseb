<?php

namespace App\Controller;

use App\Entity\Label;
use App\Form\LabelType;
use App\Repository\LabelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/label")
 */
class AdminLabelController extends AbstractController
{
    /**
     * @Route("/", name="admin_label_index", methods={"GET"})
     */
    public function index(LabelRepository $labelRepository): Response
    {
        return $this->render('admin_label/index.html.twig', [
            'labels' => $labelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_label_new", methods={"GET", "POST"})
     */
    public function new(Request $request, LabelRepository $labelRepository): Response
    {
        $label = new Label();
        $form = $this->createForm(LabelType::class, $label);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $labelRepository->add($label, true);

            return $this->redirectToRoute('admin_label_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_label/new.html.twig', [
            'label' => $label,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_label_show", methods={"GET"})
     */
    public function show(Label $label): Response
    {
        return $this->render('admin_label/show.html.twig', [
            'label' => $label,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_label_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Label $label, LabelRepository $labelRepository): Response
    {
        $form = $this->createForm(LabelType::class, $label);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $labelRepository->add($label, true);

            return $this->redirectToRoute('admin_label_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_label/edit.html.twig', [
            'label' => $label,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_label_delete", methods={"POST"})
     */
    public function delete(Request $request, Label $label, LabelRepository $labelRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$label->getId(), $request->request->get('_token'))) {
            $labelRepository->remove($label, true);
        }

        return $this->redirectToRoute('admin_label_index', [], Response::HTTP_SEE_OTHER);
    }
}
