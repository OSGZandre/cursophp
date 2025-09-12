<?php
namespace App\Controller;

use App\Form\ProdutoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProdutoController extends AbstractController
{
    /**
     * @Route("/produto/novo", name="produto_novo")
     */
    public function novo(Request $request): Response
    {
        $form = $this->createForm(ProdutoType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $pdo = new \PDO("mysql:host=172.0.0.22;port=3306;dbname=bd_teste;charset=utf8", "andre", "abc123!");
            $stmt = $pdo->prepare("INSERT INTO produto (nameProduto, preco, estoque) VALUES (:nameProduto, :preco, :estoque)");
            $stmt->bindValue(':nameProduto', $data['nameProduto']);
            $stmt->bindValue(':preco', $data['preco']);
            $stmt->bindValue(':estoque', $data['estoque']);
            $stmt->execute();
        }

        return $this->render('produto/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
