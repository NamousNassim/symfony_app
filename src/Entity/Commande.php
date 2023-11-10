<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    

    #[ORM\ManyToOne(inversedBy: 'CommUser')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?Client $comcli = null;

    #[ORM\Column(length: 255)]
    private ?string $Numc = null;

    #[ORM\ManyToOne(inversedBy: 'clincomm')]
    private ?Client $Client = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datecomm = null;

    #[ORM\Column(length: 255)]
    private ?string $observation = null;

    #[ORM\Column(length: 255)]
    private ?string $totht = null;

    #[ORM\Column(length: 255)]
    private ?string $tottva = null;

    #[ORM\Column(length: 255)]
    private ?string $totttc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

   

    

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getComcli(): ?Client
    {
        return $this->comcli;
    }

    public function setComcli(?Client $comcli): static
    {
        $this->comcli = $comcli;

        return $this;
    }

    public function getNumc(): ?string
    {
        return $this->Numc;
    }

    public function setNumc(string $Numc): static
    {
        $this->Numc = $Numc;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->Client;
    }

    public function setClient(?Client $Client): static
    {
        $this->Client = $Client;

        return $this;
    }

    public function getDatecomm(): ?\DateTimeInterface
    {
        return $this->datecomm;
    }

    public function setDatecomm(\DateTimeInterface $datecomm): static
    {
        $this->datecomm = $datecomm;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(string $observation): static
    {
        $this->observation = $observation;

        return $this;
    }

    public function getTotht(): ?string
    {
        return $this->totht;
    }

    public function setTotht(string $totht): static
    {
        $this->totht = $totht;

        return $this;
    }

    public function getTottva(): ?string
    {
        return $this->tottva;
    }

    public function setTottva(string $tottva): static
    {
        $this->tottva = $tottva;

        return $this;
    }

    public function getTotttc(): ?string
    {
        return $this->totttc;
    }

    public function setTotttc(string $totttc): static
    {
        $this->totttc = $totttc;

        return $this;
    }
}
