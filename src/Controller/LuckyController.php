<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Name;


class LuckyController extends AbstractController
{
    public function index(Name $name): Response
    {
        return $this->render('lucky/index.html.twig', 
        [
            'controller_name' => 'LuckyController',
            ''=> $name,
        ]);
    }
    
    
    public function number(): Response
    {
        $number = random_int(0, 100);
        return $this -> render
        ( 
            'lucky/index.html.twig', 
            [
            'number' => $number,            
        ]);
    }
}