<?php

namespace App\Controller;


use App\Service\Meteo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Activitys;

class PageController extends AbstractController
{
    /**
     * @Route("/page/{slug}", name="page")
     */
    public function index(Request $request, string $slug): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $resultPage = $entityManager->getRepository(Activitys::class)->findOneBy(["slug" => $slug]);

        return $this->render('page/index.html.twig', [
            'resultPage' => $resultPage,
        ]);
    }

    /**
     * @Route("/cat/{cat}", name="cat")
     */
    public function cat($cat): Response
    {

        $entityManager = $this->getDoctrine()->getManager();

        $dql = "SELECT p
            FROM App\Entity\Activitys p
            where p.description like :cat
            ORDER BY p.id ASC";
        $query = $entityManager->createQuery($dql)->setMaxResults(52);
        $query->setParameter('cat', '%' .$cat. '%');


        return $this->render('page/cat.html.twig', [
            'Leisures' => $query->getResult(),
        ]);
    }

    /**
     * @Route("/chearch/", name="chearch")
     */
    public function chearch(Request $request): Response
    {
        $chearch = $request->query->get("chearch");
        $entityManager = $this->getDoctrine()->getManager();

        $dql = "SELECT p
            FROM App\Entity\Activitys p
            where p.description like :cat
            ORDER BY p.id ASC";
        $query = $entityManager->createQuery($dql)->setMaxResults(22);
        $query->setParameter('cat', '%' .$chearch. '%');


        return $this->render('page/cat.html.twig', [
            'Leisures' => $query->getResult(),
        ]);
    }
}
