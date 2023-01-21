<?php

namespace App\Controller;

use App\Entity\Scenariste;
use App\Form\ScenaristeType;
use App\Repository\ScenaristeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/scenariste")
 */
class AdminScenaristeController extends AbstractController
{
    /**
     * @Route("/", name="admin_scenariste_index", methods={"GET"})
     */
    public function index(ScenaristeRepository $scenaristeRepository): Response
    {
        return $this->render('admin_scenariste/index.html.twig', [
            'scenaristes' => $scenaristeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_scenariste_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ScenaristeRepository $scenaristeRepository): Response
    {
        $scenariste = new Scenariste();
        $form = $this->createForm(ScenaristeType::class, $scenariste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $scenaristeRepository->add($scenariste, true);

            return $this->redirectToRoute('admin_scenariste_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_scenariste/new.html.twig', [
            'scenariste' => $scenariste,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_scenariste_show", methods={"GET"})
     */
    public function show(Scenariste $scenariste): Response
    {
        return $this->render('admin_scenariste/show.html.twig', [
            'scenariste' => $scenariste,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_scenariste_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Scenariste $scenariste, ScenaristeRepository $scenaristeRepository): Response
    {
        $form = $this->createForm(ScenaristeType::class, $scenariste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $scenaristeRepository->add($scenariste, true);

            return $this->redirectToRoute('admin_scenariste_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_scenariste/edit.html.twig', [
            'scenariste' => $scenariste,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_scenariste_delete", methods={"POST"})
     */
    public function delete(Request $request, Scenariste $scenariste, ScenaristeRepository $scenaristeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$scenariste->getId(), $request->request->get('_token'))) {
            $scenaristeRepository->remove($scenariste, true);
        }

        return $this->redirectToRoute('admin_scenariste_index', [], Response::HTTP_SEE_OTHER);
    }
}
