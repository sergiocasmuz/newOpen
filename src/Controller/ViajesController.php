<?php

namespace App\Controller;

use App\Entity\Viajes;
use App\Form\ViajesType;
use App\Repository\ViajesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/viajes")
 */
class ViajesController extends AbstractController
{
    /**
     * @Route("/", name="viajes_index", methods={"GET"})
     */
    public function index(ViajesRepository $viajesRepository): Response
    {
        return $this->render('viajes/index.html.twig', [
            'viajes' => $viajesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="viajes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $viaje = new Viajes();
        $form = $this->createForm(ViajesType::class, $viaje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($viaje);
            $entityManager->flush();

            return $this->redirectToRoute('viajes_index');
        }

        return $this->render('viajes/new.html.twig', [
            'viaje' => $viaje,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="viajes_show", methods={"GET"})
     */
    public function show(Viajes $viaje): Response
    {
        return $this->render('viajes/show.html.twig', [
            'viaje' => $viaje,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="viajes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Viajes $viaje): Response
    {
        $form = $this->createForm(ViajesType::class, $viaje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('viajes_index', [
                'id' => $viaje->getId(),
            ]);
        }

        return $this->render('viajes/edit.html.twig', [
            'viaje' => $viaje,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="viajes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Viajes $viaje): Response
    {
        if ($this->isCsrfTokenValid('delete'.$viaje->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($viaje);
            $entityManager->flush();
        }

        return $this->redirectToRoute('viajes_index');
    }
}
