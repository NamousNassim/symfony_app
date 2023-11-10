<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $prix = null;

    #[ORM\Column]
    private ?int $codesbarres = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\ManyToMany(targetEntity: Promotion::class, inversedBy: 'produits')]
    private Collection $promoprod;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: Stock::class)]
    private Collection $prodstock;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    private ?Fournisseur $ProdFourni = null;

  

    #[ORM\ManyToMany(targetEntity: Transaction::class, inversedBy: 'produits')]
    private Collection $prodtrans;

    #[ORM\OneToMany(mappedBy: 'prodCpmm', targetEntity: Lcommande::class)]
    private Collection $lcommandes;

    public function __construct()
    {
        $this->promoprod = new ArrayCollection();
        $this->prodstock = new ArrayCollection();
        $this->prodtrans = new ArrayCollection();
        $this->lcommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getCodesbarres(): ?int
    {
        return $this->codesbarres;
    }

    public function setCodesbarres(int $codesbarres): static
    {
        $this->codesbarres = $codesbarres;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Promotion>
     */
    public function getPromoprod(): Collection
    {
        return $this->promoprod;
    }

    public function addPromoprod(Promotion $promoprod): static
    {
        if (!$this->promoprod->contains($promoprod)) {
            $this->promoprod->add($promoprod);
        }

        return $this;
    }

    public function removePromoprod(Promotion $promoprod): static
    {
        $this->promoprod->removeElement($promoprod);

        return $this;
    }

    /**
     * @return Collection<int, Stock>
     */
    public function getProdstock(): Collection
    {
        return $this->prodstock;
    }

    public function addProdstock(Stock $prodstock): static
    {
        if (!$this->prodstock->contains($prodstock)) {
            $this->prodstock->add($prodstock);
            $prodstock->setProduit($this);
        }

        return $this;
    }

    public function removeProdstock(Stock $prodstock): static
    {
        if ($this->prodstock->removeElement($prodstock)) {
            // set the owning side to null (unless already changed)
            if ($prodstock->getProduit() === $this) {
                $prodstock->setProduit(null);
            }
        }

        return $this;
    }

    public function getProdFourni(): ?Fournisseur
    {
        return $this->ProdFourni;
    }

    public function setProdFourni(?Fournisseur $ProdFourni): static
    {
        $this->ProdFourni = $ProdFourni;

        return $this;
    }

    /**
     */
    

  


    /**
     * @return Collection<int, Transaction>
     */
    public function getProdtrans(): Collection
    {
        return $this->prodtrans;
    }

    public function addProdtran(Transaction $prodtran): static
    {
        if (!$this->prodtrans->contains($prodtran)) {
            $this->prodtrans->add($prodtran);
        }

        return $this;
    }

    public function removeProdtran(Transaction $prodtran): static
    {
        $this->prodtrans->removeElement($prodtran);

        return $this;
    }

    /**
     * @return Collection<int, Lcommande>
     */
    public function getLcommandes(): Collection
    {
        return $this->lcommandes;
    }

    public function addLcommande(Lcommande $lcommande): static
    {
        if (!$this->lcommandes->contains($lcommande)) {
            $this->lcommandes->add($lcommande);
            $lcommande->setProdCpmm($this);
        }

        return $this;
    }

    public function removeLcommande(Lcommande $lcommande): static
    {
        if ($this->lcommandes->removeElement($lcommande)) {
            // set the owning side to null (unless already changed)
            if ($lcommande->getProdCpmm() === $this) {
                $lcommande->setProdCpmm(null);
            }
        }

        return $this;
    }
}
