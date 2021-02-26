<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Brand::class, inversedBy="car_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity=Insurance::class, inversedBy="car_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $insurance;

    /**
     * @ORM\OneToOne(targetEntity=OfferCar::class, mappedBy="car_id", cascade={"persist", "remove"})
     */
    private $offerCar;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getInsurance(): ?Insurance
    {
        return $this->insurance;
    }

    public function setInsurance(?Insurance $insurance): self
    {
        $this->insurance = $insurance;

        return $this;
    }

    public function getOfferCar(): ?OfferCar
    {
        return $this->offerCar;
    }

    public function setOfferCar(?OfferCar $offerCar): self
    {
        // unset the owning side of the relation if necessary
        if ($offerCar === null && $this->offerCar !== null) {
            $this->offerCar->setCarId(null);
        }

        // set the owning side of the relation if necessary
        if ($offerCar !== null && $offerCar->getCarId() !== $this) {
            $offerCar->setCarId($this);
        }

        $this->offerCar = $offerCar;

        return $this;
    }
}
