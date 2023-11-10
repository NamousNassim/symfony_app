<?php

namespace App\Entity;

use App\Repository\CompteurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteurRepository::class)]
class Compteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numcom = null;

    #[ORM\Column(length: 255)]
    private ?string $numl = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumcom(): ?int
    {
        return $this->numcom;
    }

    public function setNumcom(int $numcom): static
    {
        $this->numcom = $numcom;

        return $this;
    }

    public function getNuml(): ?string
    {
        return $this->numl;
    }

    public function setNuml(string $numl): static
    {
        $this->numl = $numl;

        return $this;
    }
}
