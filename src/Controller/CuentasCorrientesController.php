<?php

namespace App\Controller;

use App\Entity\CuentasCorrientes;
use App\Form\CuentasCorrientesType;
use App\Repository\CuentasCorrientesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cuentas/corrientes")
 */
class CuentasCorrientesController extends AbstractController
{
    /**
     * @Route("/", name="cuentas_corrientes_index", methods={"GET"})
     */
    public function index(CuentasCorrientesRepository $cuentasCorrientesRepository): Response
    {
        return $this->render('cuentas_corrientes/index.html.twig', [
            'cuentas_corrientes' => $cuentasCorrientesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cuentas_corrientes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $cuentasCorriente = new CuentasCorrientes();
        $form = $this->createForm(CuentasCorrientesType::class, $cuentasCorriente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cuentasCorriente);
            $entityManager->flush();

            return $this->redirectToRoute('cuentas_corrientes_index');
        }

        return $this->render('cuentas_corrientes/new.html.twig', [
            'cuentas_corriente' => $cuentasCorriente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cuentas_corrientes_show", methods={"GET"})
     */
    public function show(CuentasCorrientes $cuentasCorriente): Response
    {
        return $this->render('cuentas_corrientes/show.html.twig', [
            'cuentas_corriente' => $cuentasCorriente,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cuentas_corrientes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CuentasCorrientes $cuentasCorriente): Response
    {
        $form = $this->createForm(CuentasCorrientesType::class, $cuentasCorriente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cuentas_corrientes_index', [
                'id' => $cuentasCorriente->getId(),
            ]);
        }

        return $this->render('cuentas_corrientes/edit.html.twig', [
            'cuentas_corriente' => $cuentasCorriente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cuentas_corrientes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CuentasCorrientes $cuentasCorriente): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cuentasCorriente->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cuentasCorriente);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cuentas_corrientes_index');
    }
}
