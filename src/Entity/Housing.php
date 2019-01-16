<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HousingRepository")
 */
class Housing
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Owner", inversedBy="housings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Address")
     * @ORM\JoinColumn(nullable=false)
     */
    private $address_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=2048)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $max_traveler;

    /**
     * @ORM\Column(type="integer")
     */
    private $bathroom_number;

    /**
     * @ORM\Column(type="float")
     */
    private $default_price;

    /**
     * @ORM\Column(type="integer")
     */
    private $min_days;

    /**
     * @ORM\Column(type="integer")
     */
    private $traveler_number;

    /**
     * @ORM\Column(type="float")
     */
    private $supp_price;

    /**
     * @ORM\Column(type="integer")
     */
    private $area;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOwnerId(): ?Owner
    {
        return $this->owner_id;
    }

    public function setOwnerId(?Owner $owner_id): self
    {
        $this->owner_id = $owner_id;

        return $this;
    }

    public function getAddressId(): ?Address
    {
        return $this->address_id;
    }

    public function setAddressId(?Address $address_id): self
    {
        $this->address_id = $address_id;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMaxTraveler(): ?int
    {
        return $this->max_traveler;
    }

    public function setMaxTraveler(int $max_traveler): self
    {
        $this->max_traveler = $max_traveler;

        return $this;
    }

    public function getBathroomNumber(): ?int
    {
        return $this->bathroom_number;
    }

    public function setBathroomNumber(int $bathroom_number): self
    {
        $this->bathroom_number = $bathroom_number;

        return $this;
    }

    public function getDefaultPrice(): ?float
    {
        return $this->default_price;
    }

    public function setDefaultPrice(float $default_price): self
    {
        $this->default_price = $default_price;

        return $this;
    }

    public function getMinDays(): ?int
    {
        return $this->min_days;
    }

    public function setMinDays(int $min_days): self
    {
        $this->min_days = $min_days;

        return $this;
    }

    public function getTravelerNumber(): ?int
    {
        return $this->traveler_number;
    }

    public function setTravelerNumber(int $traveler_number): self
    {
        $this->traveler_number = $traveler_number;

        return $this;
    }

    public function getSuppPrice(): ?float
    {
        return $this->supp_price;
    }

    public function setSuppPrice(float $supp_price): self
    {
        $this->supp_price = $supp_price;

        return $this;
    }

    public function getArea(): ?int
    {
        return $this->area;
    }

    public function setArea(int $area): self
    {
        $this->area = $area;

        return $this;
    }
}
