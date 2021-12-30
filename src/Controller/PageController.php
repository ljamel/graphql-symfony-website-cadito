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

        $villes = $entityManager->createQuery(
            'SELECT p
            FROM App\Entity\Activitys p
            where p.ville like :ville
            ORDER BY p.img DESC'
        )->setMaxResults(12);
        $villes->setParameter('ville', '%' .$resultPage->getVille(). '%');

        return $this->render('page/index.html.twig', [
            'resultPage' => $resultPage,
            'title' => $resultPage->getTitle(),
            'Leisures' => $villes->getResult()
        ]);
    }

    /**
     * @Route("/activiter/{cat}", name="cat")
     */
    public function cat($cat): Response
    {

        $entityManager = $this->getDoctrine()->getManager();

        $dql = "SELECT p
            FROM App\Entity\Activitys p
            where p.description like :cat
            ORDER BY p.id ASC";
        $query = $entityManager->createQuery($dql)->setMaxResults(52);
        $query->setParameter('cat', '% ' .$cat. '%');

        return $this->render('page/cat.html.twig', [
            'Leisures' => $query->getResult(),
            'title' => $cat
        ]);
    }

    /**
     * @Route("/chearch/", name="chearch")
     */
    public function chearch(Request $request): Response
    {
        $chearch = $request->query->get("chearch");
        $ville = $request->query->get("ville");
        $prices = $request->query->get("price");
        $entityManager = $this->getDoctrine()->getManager();

        $query = $entityManager->getRepository(Activitys::class)->chearch($chearch, $ville, $prices, $entityManager);

        return $this->render('page/cat.html.twig', [
            'Leisures' => $query,
            'title' => $chearch
        ]);
    }

    /**
     * @Route("/propos", name="propos")
     */
    public function propos(): Response
    {

        return $this->render('page/propos.html.twig');
    }

    /**
     * @Route("/mentions", name="mentions")
     */
    public function mentions(): Response
    {

        return $this->render('page/mentions.html.twig');
    }
}
