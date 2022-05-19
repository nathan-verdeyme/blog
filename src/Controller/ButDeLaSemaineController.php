<?php

namespace App\Controller;

use App\Entity\ButDeLaSemaine;
use App\Form\ButDeLaSemaineType;
use App\Repository\ButDeLaSemaineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/butDeLaSemaine')]
class ButDeLaSemaineController extends AbstractController
{
    #[Route('/', name: 'but_de_la_semaine_index', methods: ['GET'])]
    public function index(ButDeLaSemaineRepository $butDeLaSemaineRepository): Response
    {
        return $this->render('but_de_la_semaine/index.html.twig', [
            'but_de_la_semaines' => $butDeLaSemaineRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'but_de_la_semaine_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $butDeLaSemaine = new ButDeLaSemaine();
        $form = $this->createForm(ButDeLaSemaineType::class, $butDeLaSemaine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($butDeLaSemaine);
            $entityManager->flush();

            return $this->redirectToRoute('but_de_la_semaine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('but_de_la_semaine/new.html.twig', [
            'but_de_la_semaine' => $butDeLaSemaine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'but_de_la_semaine_show', methods: ['GET'])]
    public function show(ButDeLaSemaine $butDeLaSemaine): Response
    {
        return $this->render('but_de_la_semaine/show.html.twig', [
            'but_de_la_semaine' => $butDeLaSemaine,
        ]);
    }

    #[Route('/{id}/edit', name: 'but_de_la_semaine_edit', methods: ['GET','POST'])]
    public function edit(Request $request, ButDeLaSemaine $butDeLaSemaine): Response
    {
        $form = $this->createForm(ButDeLaSemaineType::class, $butDeLaSemaine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('but_de_la_semaine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('but_de_la_semaine/edit.html.twig', [
            'but_de_la_semaine' => $butDeLaSemaine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'but_de_la_semaine_delete', methods: ['POST'])]
    public function delete(Request $request, ButDeLaSemaine $butDeLaSemaine): Response
    {
        if ($this->isCsrfTokenValid('delete'.$butDeLaSemaine->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($butDeLaSemaine);
            $entityManager->flush();
        }

        return $this->redirectToRoute('but_de_la_semaine_index', [], Response::HTTP_SEE_OTHER);
    }
}
