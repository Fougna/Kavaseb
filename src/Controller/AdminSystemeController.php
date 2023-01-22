<?php

namespace App\Controller;

use App\Entity\Systeme;
use App\Form\SystemeType;
use App\Service\FileUploader;
use App\Repository\SystemeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/systeme")
 */
class AdminSystemeController extends AbstractController
{
    /**
     * @Route("/", name="admin_systeme_index", methods={"GET"})
     */
    public function index(SystemeRepository $systemeRepository): Response
    {
        return $this->render('admin_systeme/index.html.twig', [
            'systemes' => $systemeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_systeme_new", methods={"GET", "POST"})
     */
    public function new(Request $request, SystemeRepository $systemeRepository, FileUploader $fileUploader): Response
    {
        $systeme = new Systeme();
        $form = $this->createForm(SystemeType::class, $systeme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile)
            {
                $imageFileName = $fileUploader->upload($imageFile);
                $systeme->setImage($imageFileName);
            }

            $systemeRepository->add($systeme, true);

            return $this->redirectToRoute('admin_systeme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_systeme/new.html.twig', [
            'systeme' => $systeme,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_systeme_show", methods={"GET"})
     */
    public function show(Systeme $systeme): Response
    {
        return $this->render('admin_systeme/show.html.twig', [
            'systeme' => $systeme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_systeme_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Systeme $systeme, SystemeRepository $systemeRepository, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(SystemeType::class, $systeme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile)
            {
                $imageFileName = $fileUploader->upload($imageFile);
                $systeme->setImage($imageFileName);
            }

            $systemeRepository->add($systeme, true);

            return $this->redirectToRoute('admin_systeme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_systeme/edit.html.twig', [
            'systeme' => $systeme,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_systeme_delete", methods={"POST"})
     */
    public function delete(Request $request, Systeme $systeme, SystemeRepository $systemeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$systeme->getId(), $request->request->get('_token'))) {
            $systemeRepository->remove($systeme, true);
        }

        return $this->redirectToRoute('admin_systeme_index', [], Response::HTTP_SEE_OTHER);
    }
}
