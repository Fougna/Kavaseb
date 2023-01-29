<?php

namespace App\Controller;

use App\Entity\Profession;
use App\Form\ProfessionType;
use App\Repository\ProfessionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/profession")
 */
class AdminProfessionController extends AbstractController
{
    /**
     * @Route("/", name="admin_profession_index", methods={"GET"})
     */
    public function index(ProfessionRepository $professionRepository): Response
    {
        return $this->render('admin_profession/index.html.twig', [
            'professions' => $professionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_profession_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfessionRepository $professionRepository): Response
    {
        $profession = new Profession();
        $form = $this->createForm(ProfessionType::class, $profession);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $professionRepository->add($profession, true);

            return $this->redirectToRoute('admin_profession_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_profession/new.html.twig', [
            'profession' => $profession,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_profession_show", methods={"GET"})
     */
    public function show(Profession $profession): Response
    {
        return $this->render('admin_profession/show.html.twig', [
            'profession' => $profession,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_profession_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Profession $profession, ProfessionRepository $professionRepository): Response
    {
        $form = $this->createForm(ProfessionType::class, $profession);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $professionRepository->add($profession, true);

            return $this->redirectToRoute('admin_profession_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_profession/edit.html.twig', [
            'profession' => $profession,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_profession_delete", methods={"POST"})
     */
    public function delete(Request $request, Profession $profession, ProfessionRepository $professionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profession->getId(), $request->request->get('_token'))) {
            $professionRepository->remove($profession, true);
        }

        return $this->redirectToRoute('admin_profession_index', [], Response::HTTP_SEE_OTHER);
    }
}
