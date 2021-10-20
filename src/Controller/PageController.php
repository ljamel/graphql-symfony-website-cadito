<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Activitys;

class PageController extends AbstractController
{
    #[Route('/page/{slug}', name: 'page')]
    public function index(Request $request, string $slug): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $resultPage = $entityManager->getRepository(Activitys::class)->findOneBy(["slug" => $slug]);

        return $this->render('page/index.html.twig', [
            'resultPage' => $resultPage,
        ]);
    }
}
