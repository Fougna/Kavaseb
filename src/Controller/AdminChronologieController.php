<?php

namespace App\Controller;

use App\Entity\Chronologie;
use App\Form\ChronologieType;
use App\Repository\ChronologieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/chronologie")
 */
class AdminChronologieController extends AbstractController
{
    /**
     * @Route("/", name="admin_chronologie_index", methods={"GET"})
     */
    public function index(ChronologieRepository $chronologieRepository): Response
    {
        return $this->render('admin_chronologie/index.html.twig', [
            'chronologies' => $chronologieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_chronologie_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ChronologieRepository $chronologieRepository): Response
    {
        $chronologie = new Chronologie();
        $form = $this->createForm(ChronologieType::class, $chronologie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chronologieRepository->add($chronologie, true);

            return $this->redirectToRoute('admin_chronologie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_chronologie/new.html.twig', [
            'chronologie' => $chronologie,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_chronologie_show", methods={"GET"})
     */
    public function show(Chronologie $chronologie): Response
    {
        return $this->render('admin_chronologie/show.html.twig', [
            'chronologie' => $chronologie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_chronologie_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Chronologie $chronologie, ChronologieRepository $chronologieRepository): Response
    {
        $form = $this->createForm(ChronologieType::class, $chronologie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chronologieRepository->add($chronologie, true);

            return $this->redirectToRoute('admin_chronologie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_chronologie/edit.html.twig', [
            'chronologie' => $chronologie,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_chronologie_delete", methods={"POST"})
     */
    public function delete(Request $request, Chronologie $chronologie, ChronologieRepository $chronologieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chronologie->getId(), $request->request->get('_token'))) {
            $chronologieRepository->remove($chronologie, true);
        }

        return $this->redirectToRoute('admin_chronologie_index', [], Response::HTTP_SEE_OTHER);
    }
}