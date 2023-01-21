<?php

namespace App\Controller;

use App\Entity\StudioDev;
use App\Form\StudioDevType;
use App\Repository\StudioDevRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/studio/dev")
 */
class AdminStudioDevController extends AbstractController
{
    /**
     * @Route("/", name="admin_studio_dev_index", methods={"GET"})
     */
    public function index(StudioDevRepository $studioDevRepository): Response
    {
        return $this->render('admin_studio_dev/index.html.twig', [
            'studio_devs' => $studioDevRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_studio_dev_new", methods={"GET", "POST"})
     */
    public function new(Request $request, StudioDevRepository $studioDevRepository): Response
    {
        $studioDev = new StudioDev();
        $form = $this->createForm(StudioDevType::class, $studioDev);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $studioDevRepository->add($studioDev, true);

            return $this->redirectToRoute('admin_studio_dev_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_studio_dev/new.html.twig', [
            'studio_dev' => $studioDev,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_studio_dev_show", methods={"GET"})
     */
    public function show(StudioDev $studioDev): Response
    {
        return $this->render('admin_studio_dev/show.html.twig', [
            'studio_dev' => $studioDev,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_studio_dev_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, StudioDev $studioDev, StudioDevRepository $studioDevRepository): Response
    {
        $form = $this->createForm(StudioDevType::class, $studioDev);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $studioDevRepository->add($studioDev, true);

            return $this->redirectToRoute('admin_studio_dev_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_studio_dev/edit.html.twig', [
            'studio_dev' => $studioDev,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_studio_dev_delete", methods={"POST"})
     */
    public function delete(Request $request, StudioDev $studioDev, StudioDevRepository $studioDevRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$studioDev->getId(), $request->request->get('_token'))) {
            $studioDevRepository->remove($studioDev, true);
        }

        return $this->redirectToRoute('admin_studio_dev_index', [], Response::HTTP_SEE_OTHER);
    }
}
