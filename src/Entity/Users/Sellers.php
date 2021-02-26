<?php

namespace App\Entity;

use App\Repository\SellersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SellersRepository::class)
 */
class Sellers extends Users
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $dni;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contact_phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contact_mail;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $creation_user;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $modification_user;

    /**
     * @ORM\Column(type="date", length=45)
     */
    private $creation_date;

    /**
     * @ORM\Column(type="date")
     */
    private $modification_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getContactPhone(): ?string
    {
        return $this->contact_phone;
    }

    public function setContactPhone(string $contact_phone): self
    {
        $this->contact_phone = $contact_phone;

        return $this;
    }

    public function getContactMail(): ?string
    {
        return $this->contact_mail;
    }

    public function setContactMail(string $contact_mail): self
    {
        $this->contact_mail = $contact_mail;

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
}
