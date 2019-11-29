<?php

namespace App\Controller;

use App\Entity\BonIntervention;
use App\Form\BonInterventionType;
use App\Repository\BonInterventionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bon/intervention")
 */
class BonInterventionController extends AbstractController
{
    /**
     * @Route("/", name="bon_intervention_index", methods={"GET"})
     */
    public function index(BonInterventionRepository $bonInterventionRepository): Response
    {
        return $this->render('bon_intervention/index.html.twig', [
            'bon_interventions' => $bonInterventionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bon_intervention_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bonIntervention = new BonIntervention();
        $form = $this->createForm(BonInterventionType::class, $bonIntervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bonIntervention);
            $entityManager->flush();

            return $this->redirectToRoute('bon_intervention_index');
        }

        return $this->render('bon_intervention/new.html.twig', [
            'bon_intervention' => $bonIntervention,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bon_intervention_show", methods={"GET"})
     */
    public function show(BonIntervention $bonIntervention): Response
    {
        return $this->render('bon_intervention/show.html.twig', [
            'bon_intervention' => $bonIntervention,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bon_intervention_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BonIntervention $bonIntervention): Response
    {
        $form = $this->createForm(BonInterventionType::class, $bonIntervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bon_intervention_index');
        }

        return $this->render('bon_intervention/edit.html.twig', [
            'bon_intervention' => $bonIntervention,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bon_intervention_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BonIntervention $bonIntervention): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bonIntervention->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bonIntervention);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bon_intervention_index');
    }
}
