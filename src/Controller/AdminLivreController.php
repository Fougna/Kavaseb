<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Form\LivreType;
use App\Service\FileUploader;
use App\Repository\LivreRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/livre")
 */
class AdminLivreController extends AbstractController
{
    /**
     * @Route("/", name="admin_livre_index", methods={"GET"})
     */
    public function index(LivreRepository $livreRepository): Response
    {
        return $this->render('admin_livre/index.html.twig', [
            'livres' => $livreRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_livre_new", methods={"GET", "POST"})
     */
    public function new(Request $request, LivreRepository $livreRepository, FileUploader $fileUploader): Response
    {
        $livre = new Livre();
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile)
            {
                $imageFileName = $fileUploader->upload($imageFile);
                $livre->setImage($imageFileName);
            }

            $artFile = $form->get('art')->getData();
            if ($artFile)
            {
                $artFileName = $fileUploader->upload($artFile);
                $livre->setArt($artFileName);
            }

            $livreRepository->add($livre, true);

            return $this->redirectToRoute('admin_livre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_livre/new.html.twig', [
            'livre' => $livre,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_livre_show", methods={"GET"})
     */
    public function show(Livre $livre): Response
    {
        return $this->render('admin_livre/show.html.twig', [
            'livre' => $livre,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_livre_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Livre $livre, LivreRepository $livreRepository, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile)
            {
                $imageFileName = $fileUploader->upload($imageFile);
                $livre->setImage($imageFileName);
            }

            $artFile = $form->get('art')->getData();
            if ($artFile)
            {
                $artFileName = $fileUploader->upload($artFile);
                $livre->setArt($artFileName);
            }

            $livreRepository->add($livre, true);

            return $this->redirectToRoute('admin_livre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_livre/edit.html.twig', [
            'livre' => $livre,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_livre_delete", methods={"POST"})
     */
    public function delete(Request $request, Livre $livre, LivreRepository $livreRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$livre->getId(), $request->request->get('_token'))) {
            $livreRepository->remove($livre, true);
        }

        return $this->redirectToRoute('admin_livre_index', [], Response::HTTP_SEE_OTHER);
    }
}
