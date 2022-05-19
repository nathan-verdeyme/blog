<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModifierArticleController extends AbstractController
{
    /**
     * @Route("/article/modifier/{id}", name="modif_article")
     */
    public function modifArticle(){
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        // Ici il faut être admin
    }
}
