<?php

namespace App\Entity;

use App\Repository\WalletRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WalletRepository::class)]
class Wallet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'wallet', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client = null;

    #[ORM\OneToMany(targetEntity: CryptoCurrency::class, mappedBy: 'wallet', orphanRemoval: true)]
    private Collection $history;

    public function __construct()
    {
        $this->history = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection<int, CryptoCurrency>
     */
    public function getHistory(): Collection
    {
        return $this->history;
    }

    public function addHistory(CryptoCurrency $history): static
    {
        if (!$this->history->contains($history)) {
            $this->history->add($history);
            $history->setWallet($this);
        }

        return $this;
    }

    public function removeHistory(CryptoCurrency $history): static
    {
        if ($this->history->removeElement($history)) {
            // set the owning side to null (unless already changed)
            if ($history->getWallet() === $this) {
                $history->setWallet(null);
            }
        }

        return $this;
    }
}
