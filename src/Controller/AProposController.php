<?php

namespace App\Controller;

use App\Entity\APropos;
use App\Form\AProposType;
use App\Repository\AProposRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class AProposController extends AbstractController
{
    #[Route('/apropos', name: 'apropos')]
    public function index(AProposRepository $aProposRepository, MailerInterface $mailer, Request $request) : Response
    {
        $apropos = new APropos();

        $form = $this->createForm(AProposType::class, $apropos);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();


            $message = (new Email())
                ->from($contactFormData->getEmail())
                ->to('nathan.verdeyme.nv@gmail.com')
                ->subject('vous avez reçu un email')
                ->text('Sender : '.$contactFormData->getEmail().\PHP_EOL.
                    $contactFormData->getMessage(),
                    'text/plain');
            $mailer->send($message);
            $this->addFlash('success', 'Vore message a été envoyé');
            return $this->redirectToRoute('main');
        }
        return $this->renderForm('a_propos/index.html.twig', [
            'apropos' => $apropos,
            'form' => $form,
    ]);
    }

}
