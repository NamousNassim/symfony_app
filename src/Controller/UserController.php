<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\ProduitRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }
    #[Route('/dash', name: 'user_dashboard', methods: ['GET'])]

    public function dash(Request $request)
    {
        $session = $request->getSession();
        $name = $session->get('name');
        return $this->render('user/dashboard.html.twig', [
            'name' => $name,
            
        ]);
    }

    #[Route('/login', name: 'app_user_login', methods: ['GET'])]

    public function login(Request $request,UserRepository $userRepository,ProduitRepository $produitRepository): Response
    {
        $session = $request->getSession();
        $session->clear();
        $user = new User();
        $form = $this->createFormBuilder($user)
        ->add('login', TextType::class,[
         'attr' => [
             'placeholder' => 'Taper votre login',
                     ],
        
     ])
        ->add('pwd', PasswordType::class,[
         'attr' => [
             'placeholder' => 'Taper votre Password',
                     ],
        
     ])
 
         ->getForm();
 
        $form->handleRequest($request);
 
        if ($form->isSubmitted()) {
            $pwd   = $user->getPwd();
            $login = $user->getLogin();
            $user1 = $userRepository->findOneBy(array('login'=>$login,
            'pwd'=>$pwd));
           if (!$user1)
           {
            $this->get('session')->getFlashBag()->add('info',
             'Login Incorrecte Vérifier Votre Login  ....');
           }
           else
           {
            if (!$session->has('name'))
            {
                $session->set('name',$user1->getUserName());
                $name = $session->get('name');
               
                    return $this->render('user/dashboard.html.twig', [
                      'name'=>$name
                    ]); 
                }
       }
     }
 
    return $this->render('user/login.html.twig', [
     'user' => $user,
     'form' => $form->createView(),
 ]);
    }
    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
