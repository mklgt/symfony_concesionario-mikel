<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BrandRepository::class)
 */
class Brand
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CIF;

    /**
     * @ORM\Column(type="date")
     */
    private $creation_date;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $web;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $telephone;

    /**
     * @ORM\OneToMany(targetEntity=car::class, mappedBy="brand")
     */
    private $car_id;

    public function __construct()
    {
        $this->car_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCIF(): ?string
    {
        return $this->CIF;
    }

    public function setCIF(string $CIF): self
    {
        $this->CIF = $CIF;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(\DateTimeInterface $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getWeb(): ?string
    {
        return $this->web;
    }

    public function setWeb(string $web): self
    {
        $this->web = $web;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return Collection|car[]
     */
    public function getCarId(): Collection
    {
        return $this->car_id;
    }

    public function addCarId(car $carId): self
    {
        if (!$this->car_id->contains($carId)) {
            $this->car_id[] = $carId;
            $carId->setBrand($this);
        }

        return $this;
    }

    public function removeCarId(car $carId): self
    {
        if ($this->car_id->removeElement($carId)) {
            // set the owning side to null (unless already changed)
            if ($carId->getBrand() === $this) {
                $carId->setBrand(null);
            }
        }

        return $this;
    }
}
