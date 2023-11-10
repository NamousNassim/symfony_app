<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

  

   

    


    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Transaction::class)]
    private Collection $UseTrans;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Magasin::class)]
    private Collection $UseMagas;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Commande::class)]
    private Collection $CommUser;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    private ?string $login = null;

    #[ORM\Column(length: 255)]
    private ?string $pwd = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    public function __construct()
    {
        $this->UseTrans = new ArrayCollection();
        $this->UseMagas = new ArrayCollection();
        $this->CommUser = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    

    

    

    

   

   

   

    /**
     * @return Collection<int, Transaction>
     */
    public function getUseTrans(): Collection
    {
        return $this->UseTrans;
    }

    public function addUseTran(Transaction $useTran): static
    {
        if (!$this->UseTrans->contains($useTran)) {
            $this->UseTrans->add($useTran);
            $useTran->setUser($this);
        }

        return $this;
    }

    public function removeUseTran(Transaction $useTran): static
    {
        if ($this->UseTrans->removeElement($useTran)) {
            // set the owning side to null (unless already changed)
            if ($useTran->getUser() === $this) {
                $useTran->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Magasin>
     */
    public function getUseMagas(): Collection
    {
        return $this->UseMagas;
    }

    public function addUseMaga(Magasin $useMaga): static
    {
        if (!$this->UseMagas->contains($useMaga)) {
            $this->UseMagas->add($useMaga);
            $useMaga->setUser($this);
        }

        return $this;
    }

    public function removeUseMaga(Magasin $useMaga): static
    {
        if ($this->UseMagas->removeElement($useMaga)) {
            // set the owning side to null (unless already changed)
            if ($useMaga->getUser() === $this) {
                $useMaga->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommUser(): Collection
    {
        return $this->CommUser;
    }

    public function addCommUser(Commande $commUser): static
    {
        if (!$this->CommUser->contains($commUser)) {
            $this->CommUser->add($commUser);
            $commUser->setUser($this);
        }

        return $this;
    }

    public function removeCommUser(Commande $commUser): static
    {
        if ($this->CommUser->removeElement($commUser)) {
            // set the owning side to null (unless already changed)
            if ($commUser->getUser() === $this) {
                $commUser->setUser(null);
            }
        }

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): static
    {
        $this->login = $login;

        return $this;
    }

    public function getPwd(): ?string
    {
        return $this->pwd;
    }

    public function setPwd(string $pwd): static
    {
        $this->pwd = $pwd;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }
}
