<?php

namespace App\Entity;

use App\Repository\NameRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NameRepository::class)
 */
class Name
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    private $name;
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
        
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = 
        $dono = new Type($type);
        $cliente = new Type($type);

        return $this;
    }
}
