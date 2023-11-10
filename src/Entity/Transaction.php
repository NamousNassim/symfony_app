<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransactionRepository::class)]
class Transaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateTransaction = null;

    #[ORM\Column(length: 255)]
    private ?string $Montant = null;

    #[ORM\ManyToMany(targetEntity: Produit::class, mappedBy: 'prodtrans')]
    private Collection $produits;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Paiement $paiementrans = null;

    #[ORM\ManyToOne(inversedBy: 'UseTrans')]
    private ?User $user = null;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateTransaction(): ?\DateTimeInterface
    {
        return $this->DateTransaction;
    }

    public function setDateTransaction(\DateTimeInterface $DateTransaction): static
    {
        $this->DateTransaction = $DateTransaction;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->Montant;
    }

    public function setMontant(string $Montant): static
    {
        $this->Montant = $Montant;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): static
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->addProdtran($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): static
    {
        if ($this->produits->removeElement($produit)) {
            $produit->removeProdtran($this);
        }

        return $this;
    }

    public function getPaiementrans(): ?Paiement
    {
        return $this->paiementrans;
    }

    public function setPaiementrans(?Paiement $paiementrans): static
    {
        $this->paiementrans = $paiementrans;

        return $this;
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
}
