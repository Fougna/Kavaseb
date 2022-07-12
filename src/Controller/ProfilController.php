<?php

namespace App\Controller;

use App\Form\UtilisateurType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/profil")
 */
class ProfilController extends AbstractController
{
    /**
     * @Route("/", name="profil_show", methods={"GET"})
     */
    public function show(): Response
    {
        $utilisateur = $this->getUser();
        return $this->render('profil/show.html.twig',
        [
            'utilisateur' => $utilisateur,
        ]);
    }

    /**
     * @Route("/modification", name="profil_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, EntityManagerInterface $entityManager): Response
    {
        $utilisateur = $this->getUser();
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager->flush();

            return $this->redirectToRoute('profil_show', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('profil/edit.html.twig',
        [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }
}