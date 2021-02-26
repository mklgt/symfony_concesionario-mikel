<?php

namespace App\Entity;

use App\Repository\OfferCarRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OfferCarRepository::class)
 */
class OfferCar
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=offer::class, inversedBy="offerCar", cascade={"persist", "remove"})
     */
    private $offer_id;

    /**
     * @ORM\OneToOne(targetEntity=car::class, inversedBy="offerCar", cascade={"persist", "remove"})
     */
    private $car_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOfferId(): ?offer
    {
        return $this->offer_id;
    }

    public function setOfferId(?offer $offer_id): self
    {
        $this->offer_id = $offer_id;

        return $this;
    }

    public function getCarId(): ?car
    {
        return $this->car_id;
    }

    public function setCarId(?car $car_id): self
    {
        $this->car_id = $car_id;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
