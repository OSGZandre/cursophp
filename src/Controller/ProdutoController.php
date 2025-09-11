<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProdutoController extends AbstractController
{
    /**
     * @Route("/produto", name="app_produto")
     */
    public function index(): Response
    {
        return $this->render('produto/index.html.twig', [
            'controller_name' => 'ProdutoController',
        ]);
    }
}
