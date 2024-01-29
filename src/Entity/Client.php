<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $lastname = null;

    #[ORM\Column(length: 50)]
    private ?string $firstname = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $surname = null;

//    #[ORM\Column]
//    private ?int $tariff_id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $tariff_activation_date = null;

    #[ORM\OneToOne(inversedBy: 'tariff_id', cascade: ['persist', 'remove'])]
    private ?Tariff $tariff = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): static
    {
        $this->surname = $surname;

        return $this;
    }
/*
    public function getTariffId(): ?int
    {
        return $this->tariff_id;
    }

    public function setTariffId(int $tariff_id): static
    {
        $this->tariff_id = $tariff_id;

        return $this;
    }*/

    public function getTariffActivationDate(): ?\DateTimeInterface
    {
        return $this->tariff_activation_date;
    }

    public function setTariffActivationDate(\DateTimeInterface $tariff_activation_date): static
    {
        $this->tariff_activation_date = $tariff_activation_date;

        return $this;
    }

    public function getTariff(): ?Tariff
    {
        return $this->tariff;
    }

    public function setTariff(?Tariff $tariff): static
    {
        $this->tariff = $tariff;

        return $this;
    }
}
