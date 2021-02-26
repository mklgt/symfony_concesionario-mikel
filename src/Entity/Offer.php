<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OfferRepository::class)
 */
class Offer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $seller_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $offer_name;

    /**
     * @ORM\Column(type="date")
     */
    private $Due_Date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $creation_user;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $modification_user;

    /**
     * @ORM\Column(type="date")
     */
    private $creation_date;

    /**
     * @ORM\Column(type="date")
     */
    private $modification_date;

    /**
     * @ORM\OneToOne(targetEntity=OfferCar::class, mappedBy="offer_id", cascade={"persist", "remove"})
     */
    private $offerCar;

    /**
     * @ORM\OneToMany(targetEntity=offers::class, mappedBy="offer")
     */
    private $offer_id;

    public function __construct()
    {
        $this->offer_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSellerId(): ?int
    {
        return $this->seller_id;
    }

    public function setSellerId(int $seller_id): self
    {
        $this->seller_id = $seller_id;

        return $this;
    }

    public function getOfferName(): ?string
    {
        return $this->offer_name;
    }

    public function setOfferName(string $offer_name): self
    {
        $this->offer_name = $this->offer_name;

        return $this;
    }

    public function getDueDate(): ?\DateTimeInterface
    {
        return $this->Due_Date;
    }

    public function setDueDate(\DateTimeInterface $Due_Date): self
    {
        $this->Due_Date = $Due_Date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getCreationUser(): ?string
    {
        return $this->creation_user;
    }

    public function setCreationUser(string $creation_user): self
    {
        $this->creation_user = $creation_user;

        return $this;
    }

    public function getModificationUser(): ?string
    {
        return $this->modification_user;
    }

    public function setModificationUser(string $modification_user): self
    {
        $this->modification_user = $modification_user;

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

    public function getModificationDate(): ?\DateTimeInterface
    {
        return $this->modification_date;
    }

    public function setModificationDate(\DateTimeInterface $modification_date): self
    {
        $this->modification_date = $modification_date;

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
            $this->offerCar->setOfferId(null);
        }

        // set the owning side of the relation if necessary
        if ($offerCar !== null && $offerCar->getOfferId() !== $this) {
            $offerCar->setOfferId($this);
        }

        $this->offerCar = $offerCar;

        return $this;
    }

    /**
     * @return Collection|offers[]
     */
    public function getOfferId(): Collection
    {
        return $this->offer_id;
    }

    public function addOfferId(offers $offerId): self
    {
        if (!$this->offer_id->contains($offerId)) {
            $this->offer_id[] = $offerId;
            $offerId->setOffer($this);
        }

        return $this;
    }

    public function removeOfferId(offers $offerId): self
    {
        if ($this->offer_id->removeElement($offerId)) {
            // set the owning side to null (unless already changed)
            if ($offerId->getOffer() === $this) {
                $offerId->setOffer(null);
            }
        }

        return $this;
    }
}
