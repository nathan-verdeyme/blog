<?php

namespace App\Controller;


use App\Entity\Article;
use App\Entity\ButDeLaSemaine;
use App\Entity\Classement;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class NVHomeController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(UserPasswordHasherInterface $hasher): Response
    {
        /*$em = $this->getDoctrine()->getManager();
        $user = new User();
        $user ->setEmail('nathan@gmail.com')
            ->setPassword($hasher->hashPassword($user,'Nathan22'));
       $em->persist($user);
       $em->flush();*/
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');


        $user = $this->getUser();


        return $this->render('nv_home/index.html.twig', [
            'controller_name' => 'NVHomeController',

        ]);
    }

    #[Route('/articles', name: 'articles')]
    public function articles(): Response
    {
        $repo=$this->getDoctrine()->getManager()->getRepository(Classement::class);
        $equipe=$repo->findAll();
        return $this->render('nv_home/articles.html.twig',[
            'equipes' => $equipe,

        ]);
    }

    #[Route('/ButSemaine', name: 'butSemaine')]
    public function ButSemaine(): Response
    {
        $repo=$this->getDoctrine()->getManager()->getRepository(ButDeLaSemaine::class);
        $videos=$repo->findAll();
        return $this->render('nv_home/video.html.twig',[
            'videos' => $videos,

        ]);
    }
    #[Route('/news', name: 'news')]
    public function news(): Response
    {
        $repo=$this->getDoctrine()->getManager()->getRepository(Article::class);
        $news=$repo->findAll();
        return $this->render('nv_home/news.html.twig',[
            'news' => $news,

        ]);
    }
}
