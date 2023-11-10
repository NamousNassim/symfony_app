<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numl = null;

    #[ORM\Column(length: 255)]
    private ?string $observation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateliv = null;

    #[ORM\Column(length: 255)]
    private ?string $totht = null;

    #[ORM\Column(length: 255)]
    private ?string $tottva = null;

    #[ORM\Column(length: 255)]
    private ?string $totttc = null;

    #[ORM\ManyToOne(inversedBy: 'livraisons')]
    private ?Client $clilivr = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(string $observation): static
    {
        $this->observation = $observation;

        return $this;
    }

    public function getDateliv(): ?\DateTimeInterface
    {
        return $this->dateliv;
    }

    public function setDateliv(\DateTimeInterface $dateliv): static
    {
        $this->dateliv = $dateliv;

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

    public function getClilivr(): ?Client
    {
        return $this->clilivr;
    }

    public function setClilivr(?Client $clilivr): static
    {
        $this->clilivr = $clilivr;

        return $this;
    }
}
