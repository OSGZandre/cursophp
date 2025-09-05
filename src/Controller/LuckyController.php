<?php

namespace App\Controller;

use App\Entity\UserTable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends AbstractController
{
    public function number(EntityManagerInterface $entityManager): Response
    {
        $number = random_int(0, 100);
        $name = $entityManager->getRepository(UserTable::class)->findAll();
        
        return $this->render('lucky/index.html.twig', [
            'number' => $number,
            'name' => $name,
        ]);
    }
    
    
    public function save(Request $request, EntityManagerInterface $entityManager): Response
    {
        //dd($request);
        
        $nomeDigitado = $request->get('name');
        
        
        $name = new UserTable();
        $name->setName($nomeDigitado);
        $entityManager->getRepository(UserTable::class)->add($name, true);
        
        
        return $this->redirectToRoute('app_lucky_number');
        
    }
}
