<?php

namespace App\Controller;

use App\Repository\ClassementRepository;
use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassementMondeController extends AbstractController
{
    #[Route('/club', name: 'club')]
    public function club(ClassementRepository $repo,TypeRepository $repoType): Response
    {

        $type = $repoType->findBy(
            ['nom' => 'Club']
        );

        $equipe = $repo->findBy(
            ['type' => $type], ['dateEquipe' => 'ASC']
        );

        return $this->render('classement_monde/index.html.twig',[
            'equipes' => $equipe
        ]);
    }

    #[Route('/equipe', name: 'equipe')]
    public function equipe(ClassementRepository $repo,TypeRepository $repoType): Response
    {

        $type = $repoType->findBy(
            ['nom' => 'Equipe']
        );

        $equipe = $repo->findBy(
            ['type' => $type], ['dateEquipe' => 'ASC']
        );

        return $this->render('classement_monde/index.html.twig',[
            'equipes' => $equipe
        ]);
    }

}
