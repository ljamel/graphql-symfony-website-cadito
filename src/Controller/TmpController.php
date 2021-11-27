<?php

namespace App\Controller;

use App\Entity\Tmp;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\TmpType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\Form\Forms;

class TmpController extends AbstractController
{
    /**
     * @Route("/djnjvpma", name="djnjvpma")
     */
    public function index(Request $request): Response
    {

        $contact = new Tmp();

        $form = $this->createForm(TmpType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $this->addFlash('success', 'Vous venez de subir un phishing. Mais ne vous inqiueter pas ces votre formateur qui vous a tester !!!');
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $contact = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('djnjvpma');
        }

        return $this->render('tmp/fish.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
