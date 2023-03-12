<?php

namespace App\Controller;

use App\Entity\Activitys;
use App\Service\Meteo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(Meteo $meteo): Response
    {
        // SELECT description, length(description) FROM `activitys` WHERE length(description) > 120 ORDER BY `length(description)` ASC

        $entityManager = $this->getDoctrine()->getManager();

        $query = $entityManager->createQuery(
            'SELECT p
            FROM App\Entity\Activitys p
            WHERE length(p.description) > 120
            ORDER BY p.img DESC'
        )->setMaxResults(52);

        $nb = $entityManager->createQuery(
            'SELECT count(1)
            FROM App\Entity\Activitys p
            ORDER BY p.id ASC'
        )->getSingleResult();


        return $this->render('index/index.html.twig', [
            'Leisures' => $query->getResult(),
            'meteo' => $meteo->getTemp(),
            'nb' => $nb
        ]);
    }
}
