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
        $pdo = new \PDO("mysql:host=172.0.0.22;port=3306;dbname=bd_teste;charset=utf8", "andre", "abc123!");
        $produto = null;
        if( $request->query->get("idProduto") ) {
            $stmt = $pdo->prepare("SELECT * FROM produto WHERE idProduto = :idProduto");
            $stmt->bindValue(':idProduto', $request->query->get("idProduto"));
            $stmt->execute();
            $produto = $stmt->fetch(\PDO::FETCH_ASSOC);
        }


        $form = $this->createForm(ProdutoType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            if($produto) {
                $data['idProduto'] = $produto['idProduto'];
                $this->updateProduto($data);
                return $this->redirectToRoute('produto_novo', ['idProduto' => $data['idProduto'] ]);
            }else {   
                $stmt = $pdo->prepare("INSERT INTO produto (nameProduto, preco, estoque) VALUES (:nameProduto, :preco, :estoque)");
                $stmt->bindValue(':nameProduto', $data['nameProduto']);
                $stmt->bindValue(':preco', $data['preco']);
                $stmt->bindValue(':estoque', $data['estoque']);
       
                $stmt->execute();
            }
            
            return $this->redirectToRoute('produto_novo');
        }
        $produto = $pdo->query("SELECT * FROM produto")->fetchAll(\PDO::FETCH_ASSOC);
        return $this->render('produto/index.html.twig', [
            'form' => $form->createView(),
            'produto'=> $produto
        ]);
        }
    public function updateProduto($data)
    {
        try {
            $pdo = new \PDO(
                "mysql:host=172.0.0.22;port=3306;dbname=bd_teste;charset=utf8","andre","abc123!"
            );

            $sql = "UPDATE produto SET nameProduto = :nameProduto, preco = :preco, estoque = :estoque WHERE idProduto = :idProduto";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nameProduto', $data['nameProduto']);
            $stmt->bindValue(':preco', $data['preco']);
            $stmt->bindValue(':estoque', $data['estoque']);
            $stmt->bindValue(':idProduto', $data['idProduto']);
            $stmt->execute();

            return true;
        } catch (\Exception $e) {
            dump($e->getMessage());
            return false;
        }
    }
}