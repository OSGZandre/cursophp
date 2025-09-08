<?php

namespace App\Controller;

use App\Entity\UserTable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\UserRepository;

class LuckyController extends AbstractController
{
    public function number(EntityManagerInterface $entityManager): Response
    {
        $name = $entityManager->getRepository(UserTable::class)->findAll();
        $email = $entityManager->getRepository(UserTable::class)->findAll();
        $telephoneNumber = $entityManager->getRepository(UserTable::class)->findAll();
        return $this->render('lucky/index.html.twig', [
            'name' => $name,
            'email' => $email,
            'telephoneNumber' => $telephoneNumber,
        ]);
    }
    
    
    public function saveName(Request $request, EntityManagerInterface $entityManager): Response
    {
        
        $nomeDigitado = $request->get('name');
        $emailDigitado = $request->get('email');
        $telephoneNumber = $request->get('telephoneNumber');
        
        $user = new UserTable();
        $user->setName($nomeDigitado);
        $user->setEmail($emailDigitado);
        $user->setTelephoneNumber($telephoneNumber);
        $entityManager->getRepository(UserTable::class)->add($user, true);
        //dd($telephoneNumber);
        
        
        return $this->redirectToRoute('app_lucky_number');
        
    }
}
