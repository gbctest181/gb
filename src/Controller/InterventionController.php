<?php

namespace App\Controller;

use App\Entity\ClientFinal;
use App\Entity\Intervention;
use App\Form\InterventionType;
use App\Repository\InterventionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/intervention")
 */
class InterventionController extends AbstractController
{
    /**
     * @Route("/", name="intervention_index", methods={"GET"})
     * @param InterventionRepository $interventionRepository
     * @return Response
     */
    public function index(InterventionRepository $interventionRepository): Response
    {
        return $this->render('intervention/index.html.twig', [
            'interventions' => $interventionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="intervention_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $intervention = new Intervention();
        $form = $this->createForm(InterventionType::class, $intervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($intervention);
            $entityManager->flush();

            return $this->redirectToRoute('intervention_index');
        }

        return $this->render('intervention/new.html.twig', [
            'intervention' => $intervention,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="intervention_show", methods={"GET"})
     * @param Intervention $intervention
     * @return Response
     */
    public function show(Intervention $intervention): Response
    {
        return $this->render('intervention/show.html.twig', [
            'intervention' => $intervention,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="intervention_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Intervention $intervention
     * @return Response
     */
    public function edit(Request $request, Intervention $intervention): Response
    {
        $form = $this->createForm(InterventionType::class, $intervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('intervention_index');
        }

        return $this->render('intervention/edit.html.twig', [
            'intervention' => $intervention,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="intervention_delete", methods={"DELETE"})
     * @param Request $request
     * @param Intervention $intervention
     * @return Response
     */
    public function delete(Request $request, Intervention $intervention): Response
    {
        if ($this->isCsrfTokenValid('delete'.$intervention->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($intervention);
            $entityManager->flush();
        }

        return $this->redirectToRoute('intervention_index');
    }

    /**
     * //Proces verbal
     * @Route("/procesverbal/{id}", name="intervention_pv", methods={"GET"})
     * @param Intervention $intervention
     * @param ClientFinal $clientFinal
     * @return Response
     */
    public function showPV(Intervention $intervention, ClientFinal $clientFinal): Response
    {
        return $this->render('intervention/procesverbal.html.twig', [
            'intervention' => $intervention,

        ]);
    }

    /**
     * //Bon d'intervention
     * @Route("/bonintervention/{id}", name="intervention_bi", methods={"GET"})
     * @param Intervention $intervention
     * @return Response
     */
    public function showBI(Intervention $intervention): Response
    {
        return $this->render('intervention/bonintervention.html.twig', [
            'intervention' => $intervention,
        ]);
    }

    /**
     * //Formation
     * @Route("/formation/{id}", name="intervention_for", methods={"GET"})
     * @param Intervention $intervention
     * @return Response
     */
    public function showForma(Intervention $intervention): Response
    {
        return $this->render('intervention/formation.html.twig', [
            'intervention' => $intervention,
        ]);
    }
}
