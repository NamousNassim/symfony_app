<?php

namespace App\Controller;

use App\Entity\Lcommande;
use App\Form\LcommandeType;
use App\Repository\LcommandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/lcommande')]
class LcommandeController extends AbstractController
{
    #[Route('/', name: 'app_lcommande_index', methods: ['GET'])]
    public function index(LcommandeRepository $lcommandeRepository): Response
    {
        return $this->render('lcommande/index.html.twig', [
            'lcommandes' => $lcommandeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_lcommande_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $lcommande = new Lcommande();
        $form = $this->createForm(LcommandeType::class, $lcommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($lcommande);
            $entityManager->flush();

            return $this->redirectToRoute('app_lcommande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lcommande/new.html.twig', [
            'lcommande' => $lcommande,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_lcommande_show', methods: ['GET'])]
    public function show(Lcommande $lcommande): Response
    {
        return $this->render('lcommande/show.html.twig', [
            'lcommande' => $lcommande,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_lcommande_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Lcommande $lcommande, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LcommandeType::class, $lcommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_lcommande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lcommande/edit.html.twig', [
            'lcommande' => $lcommande,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_lcommande_delete', methods: ['POST'])]
    public function delete(Request $request, Lcommande $lcommande, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lcommande->getId(), $request->request->get('_token'))) {
            $entityManager->remove($lcommande);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_lcommande_index', [], Response::HTTP_SEE_OTHER);
    }
}
