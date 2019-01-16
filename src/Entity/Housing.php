<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Photo", mappedBy="housing_id", orphanRemoval=true)
     */
    private $photos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bedroom", mappedBy="housing_id", orphanRemoval=true)
     */
    private $bedrooms;

    public function __construct()
    {
        $this->photos = new ArrayCollection();
        $this->bedrooms = new ArrayCollection();
    }

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

    /**
     * @return Collection|Photo[]
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos[] = $photo;
            $photo->setHousingId($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->contains($photo)) {
            $this->photos->removeElement($photo);
            // set the owning side to null (unless already changed)
            if ($photo->getHousingId() === $this) {
                $photo->setHousingId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Bedroom[]
     */
    public function getBedrooms(): Collection
    {
        return $this->bedrooms;
    }

    public function addBedroom(Bedroom $bedroom): self
    {
        if (!$this->bedrooms->contains($bedroom)) {
            $this->bedrooms[] = $bedroom;
            $bedroom->setHousingId($this);
        }

        return $this;
    }

    public function removeBedroom(Bedroom $bedroom): self
    {
        if ($this->bedrooms->contains($bedroom)) {
            $this->bedrooms->removeElement($bedroom);
            // set the owning side to null (unless already changed)
            if ($bedroom->getHousingId() === $this) {
                $bedroom->setHousingId(null);
            }
        }

        return $this;
    }
}
