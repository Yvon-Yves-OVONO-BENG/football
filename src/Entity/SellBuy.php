<?php

namespace App\Entity;

use App\Repository\SellBuyRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SellBuyRepository::class)]
class SellBuy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Team $fromTeam = null;

    #[ORM\ManyToOne]
    private ?Team $toTeam = null;

    #[ORM\Column(nullable: true)]
    private ?float $amount = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateAt = null;

    #[ORM\ManyToOne(inversedBy: 'sellBuys')]
    private ?player $player = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFromTeam(): ?Team
    {
        return $this->fromTeam;
    }

    public function setFromTeam(?Team $fromTeam): self
    {
        $this->fromTeam = $fromTeam;

        return $this;
    }

    public function getToTeam(): ?Team
    {
        return $this->toTeam;
    }

    public function setToTeam(?Team $toTeam): self
    {
        $this->toTeam = $toTeam;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getDateAt(): ?\DateTimeInterface
    {
        return $this->dateAt;
    }

    public function setDateAt(?\DateTimeInterface $dateAt): self
    {
        $this->dateAt = $dateAt;

        return $this;
    }

    public function getPlayer(): ?player
    {
        return $this->player;
    }

    public function setPlayer(?player $player): self
    {
        $this->player = $player;

        return $this;
    }

    
}
