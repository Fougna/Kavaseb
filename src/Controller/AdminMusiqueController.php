<?php

namespace App\Controller;

use App\Entity\Musique;
use App\Form\MusiqueType;
use App\Service\FileUploader;
use App\Repository\MusiqueRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/musique")
 */
class AdminMusiqueController extends AbstractController
{
    /**
     * @Route("/", name="admin_musique_index", methods={"GET"})
     */
    public function index(MusiqueRepository $musiqueRepository): Response
    {
        return $this->render('admin_musique/index.html.twig', [
            'musiques' => $musiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_musique_new", methods={"GET", "POST"})
     */
    public function new(Request $request, MusiqueRepository $musiqueRepository, FileUploader $fileUploader): Response
    {
        $musique = new Musique();
        $form = $this->createForm(MusiqueType::class, $musique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile)
            {
                $imageFileName = $fileUploader->upload($imageFile);
                $musique->setImage($imageFileName);
            }

            $artFile = $form->get('art')->getData();
            if ($artFile)
            {
                $artFileName = $fileUploader->upload($artFile);
                $musique->setArt($artFileName);
            }

            $musiqueRepository->add($musique, true);

            return $this->redirectToRoute('admin_musique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_musique/new.html.twig', [
            'musique' => $musique,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_musique_show", methods={"GET"})
     */
    public function show(Musique $musique): Response
    {
        return $this->render('admin_musique/show.html.twig', [
            'musique' => $musique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_musique_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Musique $musique, MusiqueRepository $musiqueRepository, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(MusiqueType::class, $musique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile)
            {
                $imageFileName = $fileUploader->upload($imageFile);
                $musique->setImage($imageFileName);
            }

            $artFile = $form->get('art')->getData();
            if ($artFile)
            {
                $artFileName = $fileUploader->upload($artFile);
                $musique->setArt($artFileName);
            }

            $musiqueRepository->add($musique, true);

            return $this->redirectToRoute('admin_musique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_musique/edit.html.twig', [
            'musique' => $musique,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_musique_delete", methods={"POST"})
     */
    public function delete(Request $request, Musique $musique, MusiqueRepository $musiqueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$musique->getId(), $request->request->get('_token'))) {
            $musiqueRepository->remove($musique, true);
        }

        return $this->redirectToRoute('admin_musique_index', [], Response::HTTP_SEE_OTHER);
    }
}
