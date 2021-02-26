<?php

namespace App\Entity;

use App\Repository\InsuranceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InsuranceRepository::class)
 */
class Insurance
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
    private $company;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity=car::class, mappedBy="insurance")
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

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

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
            $carId->setInsurance($this);
        }

        return $this;
    }

    public function removeCarId(car $carId): self
    {
        if ($this->car_id->removeElement($carId)) {
            // set the owning side to null (unless already changed)
            if ($carId->getInsurance() === $this) {
                $carId->setInsurance(null);
            }
        }

        return $this;
    }
}
