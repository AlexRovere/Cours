<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $token;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getToken(): ?int
    {
        return $this->token;
    }

    public function setToken(int $token): self
    {
        $this->token = $token;

        return $this;
    }
}
