<?php

namespace App\Entity;

use App\Repository\UserTableRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserTableRepository::class)
 * @ORM\Table(name="userTable")
 */
class UserTable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @var 
     */
    private $email;

    /**
     * @ORM\Column(type="string", name="telephoneNumber")
     */
    private $telephoneNumber;


    /**
     * @ORM\Column(type="integer", name="isAdmin",  length=1)
     * 
     */
    private $isAdmin;


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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephoneNumber(): ?string
    {
        return $this->telephoneNumber;
    }

    public function setTelephoneNumber(string $telephoneNumber): self
    {
        $this->telephoneNumber = $telephoneNumber;

        return $this;
    }
    public function setAdmin(int $isAdmin): self
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }
    public function getAdmin(): ?int
    {
        return $this->isAdmin;
    }
}