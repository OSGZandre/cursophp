<?php

namespace App\Controller;

use App\Entity\Name;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends AbstractController
{
    public function number(EntityManagerInterface $entityManager): Response
    {
        $number = random_int(0, 100);
        $names = $entityManager->getRepository(Name::class)->findAll();

        return $this->render('lucky/index.html.twig', [
            'number' => $number,
            'names' => $names,
        ]);
    }

    
    public function save(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            $nomeDigitado = $request->request->get('nome');

            if ($nomeDigitado) {
                $name = new Name();
                $name->setNome($nomeDigitado);

    }
    }
  }
}
