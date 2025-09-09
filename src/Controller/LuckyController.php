<?php

namespace App\Controller;

use App\Entity\UserTable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\UserRepository;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number", name="app_lucky_number", methods={"GET"})
     */
    public function number(EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(UserTable::class)->findAll();
        return $this->render('lucky/index.html.twig', [
            'users' => $users,  // Use um único array para loop
        ]);
    }
    
    
    /**
     * @Route("/lucky/save", name="app_lucky_save", methods={"POST"})
     */
    public function saveName(Request $request, EntityManagerInterface $entityManager): Response
    {
        $nomeDigitado = $request->request->get('name');
        $emailDigitado = $request->request->get('email');
        $telephoneNumber = $request->request->get('telephoneNumber');

        $user = new UserTable();
        $user->setName($nomeDigitado);
        $user->setEmail($emailDigitado);
        $user->setTelephoneNumber($telephoneNumber);

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->redirectToRoute('app_lucky_number');
    }
}
