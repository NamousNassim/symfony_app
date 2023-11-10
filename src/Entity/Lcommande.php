<?php

namespace App\Entity;

use App\Repository\LcommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LcommandeRepository::class)]
class Lcommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Numc = null;

    #[ORM\ManyToOne(inversedBy: 'lcommandes')]
    private ?Produit $prodCpmm = null;

    #[ORM\Column(length: 255)]
    private ?string $pv = null;

    #[ORM\Column(length: 255)]
    private ?string $qte = null;

    #[ORM\Column(length: 255)]
    private ?string $tva = null;

    #[ORM\Column(length: 255)]
    private ?string $lig = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getProdCpmm(): ?Produit
    {
        return $this->prodCpmm;
    }

    public function setProdCpmm(?Produit $prodCpmm): static
    {
        $this->prodCpmm = $prodCpmm;

        return $this;
    }

    public function getPv(): ?string
    {
        return $this->pv;
    }

    public function setPv(string $pv): static
    {
        $this->pv = $pv;

        return $this;
    }

    public function getQte(): ?string
    {
        return $this->qte;
    }

    public function setQte(string $qte): static
    {
        $this->qte = $qte;

        return $this;
    }

    public function getTva(): ?string
    {
        return $this->tva;
    }

    public function setTva(string $tva): static
    {
        $this->tva = $tva;

        return $this;
    }

    public function getLig(): ?string
    {
        return $this->lig;
    }

    public function setLig(string $lig): static
    {
        $this->lig = $lig;

        return $this;
    }
}
