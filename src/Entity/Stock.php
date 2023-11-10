<?php

namespace App\Entity;

use App\Repository\StockRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StockRepository::class)]
class Stock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $produitAssocie = null;

    #[ORM\Column(length: 255)]
    private ?string $quantite = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateMiseajour = null;

    #[ORM\ManyToOne(inversedBy: 'prodstock')]
    private ?Produit $produit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduitAssocie(): ?string
    {
        return $this->produitAssocie;
    }

    public function setProduitAssocie(string $produitAssocie): static
    {
        $this->produitAssocie = $produitAssocie;

        return $this;
    }

    public function getQuantite(): ?string
    {
        return $this->quantite;
    }

    public function setQuantite(string $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getDateMiseajour(): ?\DateTimeInterface
    {
        return $this->dateMiseajour;
    }

    public function setDateMiseajour(\DateTimeInterface $dateMiseajour): static
    {
        $this->dateMiseajour = $dateMiseajour;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): static
    {
        $this->produit = $produit;

        return $this;
    }
}
