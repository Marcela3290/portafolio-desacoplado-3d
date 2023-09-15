<?php

namespace App\Controller;

use App\Entity\ProfesionalInformation;
use App\Form\ProfesionalInformationType;
use App\Repository\ProfesionalInformationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('api/profesional-information')]
class ProfesionalInformationController extends AbstractController
{
    #[Route('/', name: 'app_profesional_information_index', methods: ['GET'])]
    public function index(ProfesionalInformationRepository $profesionalInformationRepository): Response
    {
        return $this->render('profesional_information/index.html.twig', [
            'profesional_informations' => $profesionalInformationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_profesional_information_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ProfesionalInformationRepository $profesionalInformationRepository): Response
    {
        $profesionalInformation = new ProfesionalInformation();
        $form = $this->createForm(ProfesionalInformationType::class, $profesionalInformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profesionalInformationRepository->save($profesionalInformation, true);

            return $this->redirectToRoute('app_profesional_information_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('profesional_information/new.html.twig', [
            'profesional_information' => $profesionalInformation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_profesional_information_show', methods: ['GET'])]
    public function show(ProfesionalInformation $profesionalInformation): Response
    {
        return $this->render('profesional_information/show.html.twig', [
            'profesional_information' => $profesionalInformation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_profesional_information_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ProfesionalInformation $profesionalInformation, ProfesionalInformationRepository $profesionalInformationRepository): Response
    {
        $form = $this->createForm(ProfesionalInformationType::class, $profesionalInformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profesionalInformationRepository->save($profesionalInformation, true);

            return $this->redirectToRoute('app_profesional_information_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('profesional_information/edit.html.twig', [
            'profesional_information' => $profesionalInformation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_profesional_information_delete', methods: ['POST'])]
    public function delete(Request $request, ProfesionalInformation $profesionalInformation, ProfesionalInformationRepository $profesionalInformationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profesionalInformation->getId(), $request->request->get('_token'))) {
            $profesionalInformationRepository->remove($profesionalInformation, true);
        }

        return $this->redirectToRoute('app_profesional_information_index', [], Response::HTTP_SEE_OTHER);
    }
}
