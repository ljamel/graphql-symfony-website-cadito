<?php

namespace App\Controller;

use App\Entity\Activitys;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        $data = file_get_contents('https://api.meteo-concept.com/api/forecast/daily/0?token=68874e7171a98129f5640d2550f8783c345c97c7206509f2899a90f4ba7ed10c&insee=35238');

        if ($data !== false) {
            $decoded = json_decode($data);
            $city = $decoded->city;
            $forecast = $decoded->forecast;

            $meteo = $forecast->tmax;
        }
        $entityManager = $this->getDoctrine()->getManager();

        $query = $entityManager->createQuery(
            'SELECT p
            FROM App\Entity\Activitys p
            ORDER BY p.id ASC'
        )->setMaxResults(12);


        return $this->render('index/index.html.twig', [
            'Leisures' => $query->getResult(),
            'meteo' => $meteo
        ]);
    }
}
