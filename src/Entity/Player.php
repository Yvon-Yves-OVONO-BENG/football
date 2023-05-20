<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $surname = null;

    #[ORM\ManyToOne(inversedBy: 'players')]
    private ?Team $team = null;

    #[ORM\Column(nullable: true)]
    private ?bool $forSale = null;

    #[ORM\OneToMany(mappedBy: 'player', targetEntity: ForSale::class)]
    private Collection $forSales;

    #[ORM\OneToMany(mappedBy: 'player', targetEntity: SellBuy::class)]
    private Collection $sellBuys;

    public function __construct()
    {
        $this->forSales = new ArrayCollection();
        $this->sellBuys = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;

        return $this;
    }

    public function isForSale(): ?bool
    {
        return $this->forSale;
    }

    public function setForSale(?bool $forSale): self
    {
        $this->forSale = $forSale;

        return $this;
    }

    /**
     * @return Collection<int, ForSale>
     */
    public function getForSales(): Collection
    {
        return $this->forSales;
    }

    public function addForSale(ForSale $forSale): self
    {
        if (!$this->forSales->contains($forSale)) {
            $this->forSales->add($forSale);
            $forSale->setPlayer($this);
        }

        return $this;
    }

    public function removeForSale(ForSale $forSale): self
    {
        if ($this->forSales->removeElement($forSale)) {
            // set the owning side to null (unless already changed)
            if ($forSale->getPlayer() === $this) {
                $forSale->setPlayer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SellBuy>
     */
    public function getSellBuys(): Collection
    {
        return $this->sellBuys;
    }

    public function addSellBuy(SellBuy $sellBuy): self
    {
        if (!$this->sellBuys->contains($sellBuy)) {
            $this->sellBuys->add($sellBuy);
            $sellBuy->setPlayer($this);
        }

        return $this;
    }

    public function removeSellBuy(SellBuy $sellBuy): self
    {
        if ($this->sellBuys->removeElement($sellBuy)) {
            // set the owning side to null (unless already changed)
            if ($sellBuy->getPlayer() === $this) {
                $sellBuy->setPlayer(null);
            }
        }

        return $this;
    }
}
