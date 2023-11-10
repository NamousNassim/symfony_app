<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'factures')]
    private ?Client $client = null;

    #[ORM\Column(length: 255)]
    private ?string $base0 = null;

    #[ORM\Column(length: 255)]
    private ?string $base1 = null;

    #[ORM\Column(length: 255)]
    private ?string $tva1 = null;

    #[ORM\Column(length: 255)]
    private ?string $base2 = null;

    #[ORM\Column(length: 255)]
    private ?string $tva2 = null;

    #[ORM\Column(length: 255)]
    private ?string $base3 = null;

    #[ORM\Column(length: 255)]
    private ?string $tva3 = null;

    #[ORM\Column(length: 255)]
    private ?string $totht = null;

    #[ORM\Column(length: 255)]
    private ?string $totrem = null;

    #[ORM\Column(length: 255)]
    private ?string $tottva = null;

    #[ORM\Column(length: 255)]
    private ?string $timbre = null;

    #[ORM\Column(length: 255)]
    private ?string $tottc = null;

    #[ORM\Column(length: 255)]
    private ?string $rs = null;

    #[ORM\Column(length: 255)]
    private ?string $montrs = null;

    #[ORM\Column(length: 255)]
    private ?string $net = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getBase0(): ?string
    {
        return $this->base0;
    }

    public function setBase0(string $base0): static
    {
        $this->base0 = $base0;

        return $this;
    }

    public function getBase1(): ?string
    {
        return $this->base1;
    }

    public function setBase1(string $base1): static
    {
        $this->base1 = $base1;

        return $this;
    }

    public function getTva1(): ?string
    {
        return $this->tva1;
    }

    public function setTva1(string $tva1): static
    {
        $this->tva1 = $tva1;

        return $this;
    }

    public function getBase2(): ?string
    {
        return $this->base2;
    }

    public function setBase2(string $base2): static
    {
        $this->base2 = $base2;

        return $this;
    }

    public function getTva2(): ?string
    {
        return $this->tva2;
    }

    public function setTva2(string $tva2): static
    {
        $this->tva2 = $tva2;

        return $this;
    }

    public function getBase3(): ?string
    {
        return $this->base3;
    }

    public function setBase3(string $base3): static
    {
        $this->base3 = $base3;

        return $this;
    }

    public function getTva3(): ?string
    {
        return $this->tva3;
    }

    public function setTva3(string $tva3): static
    {
        $this->tva3 = $tva3;

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

    public function getTotrem(): ?string
    {
        return $this->totrem;
    }

    public function setTotrem(string $totrem): static
    {
        $this->totrem = $totrem;

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

    public function getTimbre(): ?string
    {
        return $this->timbre;
    }

    public function setTimbre(string $timbre): static
    {
        $this->timbre = $timbre;

        return $this;
    }

    public function getTottc(): ?string
    {
        return $this->tottc;
    }

    public function setTottc(string $tottc): static
    {
        $this->tottc = $tottc;

        return $this;
    }

    public function getRs(): ?string
    {
        return $this->rs;
    }

    public function setRs(string $rs): static
    {
        $this->rs = $rs;

        return $this;
    }

    public function getMontrs(): ?string
    {
        return $this->montrs;
    }

    public function setMontrs(string $montrs): static
    {
        $this->montrs = $montrs;

        return $this;
    }

    public function getNet(): ?string
    {
        return $this->net;
    }

    public function setNet(string $net): static
    {
        $this->net = $net;

        return $this;
    }
}
