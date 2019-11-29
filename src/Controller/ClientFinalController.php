<?php

namespace App\Controller;

use App\Entity\ClientFinal;
use App\Form\ClientFinalType;
use App\Repository\ClientFinalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/client/final")
 */
class ClientFinalController extends AbstractController
{
    /**
     * @Route("/", name="client_final_index", methods={"GET"})
     */
    public function index(ClientFinalRepository $clientFinalRepository): Response
    {
        return $this->render('client_final/index.html.twig', [
            'client_finals' => $clientFinalRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="client_final_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $clientFinal = new ClientFinal();
        $form = $this->createForm(ClientFinalType::class, $clientFinal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($clientFinal);
            $entityManager->flush();

            return $this->redirectToRoute('client_final_index');
        }

        return $this->render('client_final/new.html.twig', [
            'client_final' => $clientFinal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="client_final_show", methods={"GET"})
     */
    public function show(ClientFinal $clientFinal): Response
    {
        return $this->render('client_final/show.html.twig', [
            'client_final' => $clientFinal,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="client_final_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ClientFinal $clientFinal): Response
    {
        $form = $this->createForm(ClientFinalType::class, $clientFinal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('client_final_index');
        }

        return $this->render('client_final/edit.html.twig', [
            'client_final' => $clientFinal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="client_final_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ClientFinal $clientFinal): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clientFinal->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($clientFinal);
            $entityManager->flush();
        }

        return $this->redirectToRoute('client_final_index');
    }
}
