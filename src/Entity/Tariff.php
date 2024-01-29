<?php

namespace App\Entity;

use App\Repository\TariffRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TariffRepository::class)]
class Tariff
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $speed = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\OneToOne(mappedBy: 'tariff', cascade: ['persist', 'remove'])]
    private ?Client $tariff_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSpeed(): ?int
    {
        return $this->speed;
    }

    public function setSpeed(int $speed): static
    {
        $this->speed = $speed;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getTariffId(): ?Client
    {
        return $this->tariff_id;
    }

    public function setTariffId(?Client $tariff_id): static
    {
        // unset the owning side of the relation if necessary
        if ($tariff_id === null && $this->tariff_id !== null) {
            $this->tariff_id->setTariff(null);
        }

        // set the owning side of the relation if necessary
        if ($tariff_id !== null && $tariff_id->getTariff() !== $this) {
            $tariff_id->setTariff($this);
        }

        $this->tariff_id = $tariff_id;

        return $this;
    }
}
