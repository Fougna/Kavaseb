<?php

namespace App\Controller;

use App\Entity\Personnalite;
use App\Service\FileUploader;
use App\Form\PersonnaliteType;
use App\Repository\PersonnaliteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/personnalite")
 */
class AdminPersonnaliteController extends AbstractController
{
    /**
     * @Route("/", name="admin_personnalite_index", methods={"GET"})
     */
    public function index(PersonnaliteRepository $personnaliteRepository): Response
    {
        return $this->render('admin_personnalite/index.html.twig', [
            'personnalites' => $personnaliteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_personnalite_new", methods={"GET", "POST"})
     */
    public function new(Request $request, PersonnaliteRepository $personnaliteRepository, FileUploader $fileUploader): Response
    {
        $personnalite = new Personnalite();
        $form = $this->createForm(PersonnaliteType::class, $personnalite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $photoFile = $form->get('photo')->getData();
            if ($photoFile)
            {
                $photoFileName = $fileUploader->upload($photoFile);
                $personnalite->setPhoto($photoFileName);
            }

            $personnaliteRepository->add($personnalite, true);

            return $this->redirectToRoute('admin_personnalite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_personnalite/new.html.twig', [
            'personnalite' => $personnalite,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_personnalite_show", methods={"GET"})
     */
    public function show(Personnalite $personnalite): Response
    {
        return $this->render('admin_personnalite/show.html.twig', [
            'personnalite' => $personnalite,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_personnalite_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Personnalite $personnalite, PersonnaliteRepository $personnaliteRepository, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(PersonnaliteType::class, $personnalite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $photoFile = $form->get('photo')->getData();
            if ($photoFile)
            {
                $photoFileName = $fileUploader->upload($photoFile);
                $personnalite->setPhoto($photoFileName);
            }

            $personnaliteRepository->add($personnalite, true);

            return $this->redirectToRoute('admin_personnalite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_personnalite/edit.html.twig', [
            'personnalite' => $personnalite,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_personnalite_delete", methods={"POST"})
     */
    public function delete(Request $request, Personnalite $personnalite, PersonnaliteRepository $personnaliteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personnalite->getId(), $request->request->get('_token'))) {
            $personnaliteRepository->remove($personnalite, true);
        }

        return $this->redirectToRoute('admin_personnalite_index', [], Response::HTTP_SEE_OTHER);
    }
}
