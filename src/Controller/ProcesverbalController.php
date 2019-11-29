<?php

namespace App\Controller;

use App\Entity\Procesverbal;
use App\Form\ProcesverbalType;
use App\Repository\ProcesverbalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/procesverbal")
 */
class ProcesverbalController extends AbstractController
{
    /**
     * @Route("/", name="procesverbal_index", methods={"GET"})
     */
    public function index(ProcesverbalRepository $procesverbalRepository): Response
    {
        return $this->render('procesverbal/index.html.twig', [
            'procesverbals' => $procesverbalRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="procesverbal_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $procesverbal = new Procesverbal();
        $form = $this->createForm(ProcesverbalType::class, $procesverbal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($procesverbal);
            $entityManager->flush();

            return $this->redirectToRoute('procesverbal_index');
        }

        return $this->render('procesverbal/new.html.twig', [
            'procesverbal' => $procesverbal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="procesverbal_show", methods={"GET"})
     */
    public function show(Procesverbal $procesverbal): Response
    {
        return $this->render('procesverbal/show.html.twig', [
            'procesverbal' => $procesverbal,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="procesverbal_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Procesverbal $procesverbal): Response
    {
        $form = $this->createForm(ProcesverbalType::class, $procesverbal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('procesverbal_index');
        }

        return $this->render('procesverbal/edit.html.twig', [
            'procesverbal' => $procesverbal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="procesverbal_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Procesverbal $procesverbal): Response
    {
        if ($this->isCsrfTokenValid('delete'.$procesverbal->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($procesverbal);
            $entityManager->flush();
        }

        return $this->redirectToRoute('procesverbal_index');
    }
}
