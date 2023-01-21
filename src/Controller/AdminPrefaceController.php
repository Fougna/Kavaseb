<?php

namespace App\Controller;

use App\Entity\Preface;
use App\Form\PrefaceType;
use App\Repository\PrefaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/preface")
 */
class AdminPrefaceController extends AbstractController
{
    /**
     * @Route("/", name="admin_preface_index", methods={"GET"})
     */
    public function index(PrefaceRepository $prefaceRepository): Response
    {
        return $this->render('admin_preface/index.html.twig', [
            'prefaces' => $prefaceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_preface_new", methods={"GET", "POST"})
     */
    public function new(Request $request, PrefaceRepository $prefaceRepository): Response
    {
        $preface = new Preface();
        $form = $this->createForm(PrefaceType::class, $preface);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $prefaceRepository->add($preface, true);

            return $this->redirectToRoute('admin_preface_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_preface/new.html.twig', [
            'preface' => $preface,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_preface_show", methods={"GET"})
     */
    public function show(Preface $preface): Response
    {
        return $this->render('admin_preface/show.html.twig', [
            'preface' => $preface,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_preface_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Preface $preface, PrefaceRepository $prefaceRepository): Response
    {
        $form = $this->createForm(PrefaceType::class, $preface);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $prefaceRepository->add($preface, true);

            return $this->redirectToRoute('admin_preface_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_preface/edit.html.twig', [
            'preface' => $preface,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_preface_delete", methods={"POST"})
     */
    public function delete(Request $request, Preface $preface, PrefaceRepository $prefaceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$preface->getId(), $request->request->get('_token'))) {
            $prefaceRepository->remove($preface, true);
        }

        return $this->redirectToRoute('admin_preface_index', [], Response::HTTP_SEE_OTHER);
    }
}
