<?php

namespace App\Entity;

use App\Repository\ProdutoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProdutoRepository::class)
 */
class Produto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameProduto;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $produto;

    /**
     * @ORM\Column(type="integer")
     */
    private $estoque;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameProduto(): ?string
    {
        return $this->nameProduto;
    }

    public function setNameProduto(string $nameProduto): self
    {
        $this->nameProduto = $nameProduto;

        return $this;
    }

    public function getProduto(): ?string
    {
        return $this->produto;
    }

    public function setProduto(?string $produto): self
    {
        $this->produto = $produto;

        return $this;
    }

    public function getEstoque(): ?int
    {
        return $this->estoque;
    }

    public function setEstoque(int $estoque): self
    {
        $this->estoque = $estoque;

        return $this;
    }
}
