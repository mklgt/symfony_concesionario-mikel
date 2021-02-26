<?php

namespace App\Entity;

use App\Repository\OffersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffersRepository::class)
 */
class Offers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
      /**
   * @ORM\ManyToOne(targetEntity="App\Entity\Sellers", inversedBy="offers",cascade={"persist"})
   * @ORM\JoinColumn(name="seller_id", referencedColumnName="id")
   */
  private $seller;

  public function getSeller() {
    return $this->seller;
  }

  public function setSeller($seller) {
    $this->seller= $seller;
  }
   /**
   * @ORM\OneToMany(targetEntity="App\Entity\OfferCar", mappedBy="offer")
   */
  private $offers_car;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $title;

  /**
   * @ORM\Column(type="float")
   */
  private $price;

  /**
   * @ORM\ManyToOne(targetEntity=Offer::class, inversedBy="offer_id")
   */
  private $offer;

  public function getTitle(): ?string
  {
      return $this->title;
  }

  public function setTitle(string $title): self
  {
      $this->title = $title;

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

  public function getOffer(): ?Offer
  {
      return $this->offer;
  }

  public function setOffer(?Offer $offer): self
  {
      $this->offer = $offer;

      return $this;
  }
}
