<?php

namespace App\Controller;

use App\Entity\Choferes;
use App\Form\Choferes1Type;
use App\Repository\ChoferesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/choferes")
 */
class ChoferesController extends AbstractController
{
    /**
     * @Route("/", name="choferes_index", methods={"GET"})
     */
    public function index(ChoferesRepository $choferesRepository): Response
    {
        return $this->render('choferes/index.html.twig', [
            'choferes' => $choferesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="choferes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $chofere = new Choferes();
        $form = $this->createForm(Choferes1Type::class, $chofere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($chofere);
            $entityManager->flush();

            return $this->redirectToRoute('choferes_index');
        }

        return $this->render('choferes/new.html.twig', [
            'chofere' => $chofere,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="choferes_show", methods={"GET"})
     */
    public function show(Choferes $chofere): Response
    {
        return $this->render('choferes/show.html.twig', [
            'chofere' => $chofere,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="choferes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Choferes $chofere): Response
    {
        $form = $this->createForm(Choferes1Type::class, $chofere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('choferes_index', [
                'id' => $chofere->getId(),
            ]);
        }

        return $this->render('choferes/edit.html.twig', [
            'chofere' => $chofere,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="choferes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Choferes $chofere): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chofere->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($chofere);
            $entityManager->flush();
        }

        return $this->redirectToRoute('choferes_index');
    }
}
