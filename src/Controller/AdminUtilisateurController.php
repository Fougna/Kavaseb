<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\Utilisateur1Type;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/utilisateur")
 */
class AdminUtilisateurController extends AbstractController
{
    /**
     * @Route("/", name="admin_utilisateur_index", methods={"GET"})
     */
    public function index(UtilisateurRepository $utilisateurRepository): Response
    {
        return $this->render('admin_utilisateur/index.html.twig', [
            'utilisateurs' => $utilisateurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_utilisateur_new", methods={"GET", "POST"})
     */
    public function new(Request $request, UtilisateurRepository $utilisateurRepository): Response
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(Utilisateur1Type::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $utilisateurRepository->add($utilisateur, true);

            return $this->redirectToRoute('admin_utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_utilisateur/new.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_utilisateur_show", methods={"GET"})
     */
    public function show(Utilisateur $utilisateur): Response
    {
        return $this->render('admin_utilisateur/show.html.twig', [
            'utilisateur' => $utilisateur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_utilisateur_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Utilisateur $utilisateur, UtilisateurRepository $utilisateurRepository): Response
    {
        $form = $this->createForm(Utilisateur1Type::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $utilisateurRepository->add($utilisateur, true);

            return $this->redirectToRoute('admin_utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_utilisateur/edit.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_utilisateur_delete", methods={"POST"})
     */
    public function delete(Request $request, Utilisateur $utilisateur, UtilisateurRepository $utilisateurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$utilisateur->getId(), $request->request->get('_token'))) {
            $utilisateurRepository->remove($utilisateur, true);
        }

        return $this->redirectToRoute('admin_utilisateur_index', [], Response::HTTP_SEE_OTHER);
    }
}
