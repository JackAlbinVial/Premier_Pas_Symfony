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

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column]
    private ?float $MonthPrice = null;

    #[ORM\Column]
    private ?float $DayPrice = null;

    #[ORM\Column]
    private ?bool $Gearbox = null;

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

    public function getMonthPrice(): ?float
    {
        return $this->MonthPrice;
    }

    public function setMonthPrice(?float $MonthPrice): static
    {
        $this->MonthPrice = $MonthPrice;

        return $this;
    }

    public function getDayPrice(): ?float
    {
        return $this->DayPrice;
    }

    public function setDayPrice(?float $DayPrice): static
    {
        $this->DayPrice = $DayPrice;

        return $this;
    }

    public function getGearbox(): ?bool
    {
        return $this->Gearbox;
    }

    public function setGearbox(bool $Gearbox): static
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
