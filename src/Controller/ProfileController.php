<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\RegistrationFormType;
use App\Repository\ProjetsRepository;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

#[Route('/profile')]
class ProfileController extends AbstractController
{
    #[Route('/', name: 'app_profile', methods: ['GET'])]
    public function index(ProjetsRepository $projetsRepository): Response
    {
        return $this->render('profile/index.html.twig', [
            'profile' => $projetsRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_profile_show', methods: ['GET'])]
    public function show(Users $users): Response
    {
        return $this->render('profile/show.html.twig', [
                'profile' => $users,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_profile_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, UsersRepository $usersRepository): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $langue = $this->getUser()->setLangue($user->getLangue().$user);
            $usersRepository->add($user);
            return $this->redirectToRoute('app_profile', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('profile/edit.html.twig', [
            'profile' => $user,
            'form' => $form->createView(),
        ]);
    }

}
