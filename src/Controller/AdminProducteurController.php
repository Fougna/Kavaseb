<?php

namespace App\Controller;

use App\Entity\Producteur;
use App\Form\ProducteurType;
use App\Repository\ProducteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/producteur")
 */
class AdminProducteurController extends AbstractController
{
    /**
     * @Route("/", name="admin_producteur_index", methods={"GET"})
     */
    public function index(ProducteurRepository $producteurRepository): Response
    {
        return $this->render('admin_producteur/index.html.twig', [
            'producteurs' => $producteurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_producteur_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProducteurRepository $producteurRepository): Response
    {
        $producteur = new Producteur();
        $form = $this->createForm(ProducteurType::class, $producteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $producteurRepository->add($producteur, true);

            return $this->redirectToRoute('admin_producteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_producteur/new.html.twig', [
            'producteur' => $producteur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_producteur_show", methods={"GET"})
     */
    public function show(Producteur $producteur): Response
    {
        return $this->render('admin_producteur/show.html.twig', [
            'producteur' => $producteur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_producteur_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Producteur $producteur, ProducteurRepository $producteurRepository): Response
    {
        $form = $this->createForm(ProducteurType::class, $producteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $producteurRepository->add($producteur, true);

            return $this->redirectToRoute('admin_producteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_producteur/edit.html.twig', [
            'producteur' => $producteur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_producteur_delete", methods={"POST"})
     */
    public function delete(Request $request, Producteur $producteur, ProducteurRepository $producteurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$producteur->getId(), $request->request->get('_token'))) {
            $producteurRepository->remove($producteur, true);
        }

        return $this->redirectToRoute('admin_producteur_index', [], Response::HTTP_SEE_OTHER);
    }
}
