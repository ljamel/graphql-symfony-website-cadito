<?php

namespace App\Controller;

use App\Entity\Activitys;
use App\Form\ActivitysType;
use App\Repository\ActivitysRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/activitys')]
class ActivitysController extends AbstractController
{
    #[Route('/', name: 'app_activitys_index', methods: ['GET'])]
    public function index(ActivitysRepository $activitysRepository): Response
    {
        return $this->render('activitys/index.html.twig', [
            'activitys' => $activitysRepository->findBy(['title' => "sport"]),
        ]);
    }

    #[Route('/new', name: 'app_activitys_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $activity = new Activitys();
        $form = $this->createForm(ActivitysType::class, $activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($activity);
            $entityManager->flush();

            return $this->redirectToRoute('app_activitys_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('activitys/new.html.twig', [
            'activity' => $activity,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_activitys_show', methods: ['GET'])]
    public function show(Activitys $activity): Response
    {
        return $this->render('activitys/show.html.twig', [
            'activity' => $activity,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_activitys_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Activitys $activity, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ActivitysType::class, $activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_activitys_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('activitys/edit.html.twig', [
            'activity' => $activity,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_activitys_delete', methods: ['POST'])]
    public function delete(Request $request, Activitys $activity, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$activity->getId(), $request->request->get('_token'))) {
            $entityManager->remove($activity);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_activitys_index', [], Response::HTTP_SEE_OTHER);
    }
}
