<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $MonthPrice = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $DayPrice = null;

    #[ORM\Column(length: 255)]
    private ?string $Gearbox = null;

    #[ORM\Column]
    private ?int $Places = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getMonthPrice(): ?string
    {
        return $this->MonthPrice;
    }

    public function setMonthPrice(?string $MonthPrice): static
    {
        $this->MonthPrice = $MonthPrice;

        return $this;
    }

    public function getDayPrice(): ?string
    {
        return $this->DayPrice;
    }

    public function setDayPrice(?string $DayPrice): static
    {
        $this->DayPrice = $DayPrice;

        return $this;
    }

    public function getGearbox(): ?string
    {
        return $this->Gearbox;
    }

    public function setGearbox(string $Gearbox): static
    {
        $this->Gearbox = $Gearbox;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->Places;
    }

    public function setPlaces(int $Places): static
    {
        $this->Places = $Places;

        return $this;
    }
}
