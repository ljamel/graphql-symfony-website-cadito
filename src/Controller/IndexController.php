<?php

namespace App\Controller;

use App\Entity\Activitys;
use App\Service\Meteo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(Meteo $meteo): Response
    {

        $entityManager = $this->getDoctrine()->getManager();

        $query = $entityManager->createQuery(
            'SELECT p
            FROM App\Entity\Activitys p
            ORDER BY p.id ASC'
        )->setMaxResults(52);


        return $this->render('index/index.html.twig', [
            'Leisures' => $query->getResult(),
            'meteo' => $meteo->getTemp()
        ]);
    }
}
