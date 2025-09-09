<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\AdminTable;
use App\Repository\AdminTableRepository;
use App\Entity\UserTable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;



class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="app_admin")
     */
    public function index(EntityManagerInterface $entityManager ): Response
    {
        $user = $entityManager ->getRepository(UserTable::class)->findAll();
        return $this->render('admin/index.html.twig', [
            'users' => $user,
        ]);
    }

    /**
     * @Route("/admin/edit/{id}", name="app_admin_edit", methods={"GET","POST"})
     */
    public function editUser(UserTable $user, EntityManagerInterface $entityManager, Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $user->setName($request->request->get('name') ?? $user->getName());
            $user->setEmail($request->request->get('email') ?? $user->getEmail());
            $user->setTelephoneNumber($request->request->get('telephoneNumber') ?? $user->getTelephoneNumber());

            $entityManager->flush();

            return $this->redirectToRoute('app_admin');
        }

        return $this->render('admin/edit.html.twig', [
            'user' => $user,
        ]);
    }
}
