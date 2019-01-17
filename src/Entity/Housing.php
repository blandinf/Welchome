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
    private $maxTraveler;

    /**
     * @ORM\Column(type="integer")
     */
    private $bathroomNumber;

    /**
     * @ORM\Column(type="float")
     */
    private $defaultPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $minDays;

    /**
     * @ORM\Column(type="integer")
     */
    private $travelerSupp;

    /**
     * @ORM\Column(type="float")
     */
    private $suppPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $area;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Owner", inversedBy="housings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Address", inversedBy="housings",cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Alert", mappedBy="housing", orphanRemoval=true)
     */
    private $alerts;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Booking", mappedBy="housing", orphanRemoval=true)
     */
    private $bookings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Review", mappedBy="housing", orphanRemoval=true)
     */
    private $reviews;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bedroom", mappedBy="housing", orphanRemoval=true)
     */
    private $bedrooms;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Photo", mappedBy="housing", orphanRemoval=true)
     */
    private $photos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HousingEquipment", mappedBy="housing", orphanRemoval=true)
     */
    private $housingEquipment;

    

    public function __construct()
    {
        $this->alerts = new ArrayCollection();
        $this->bookings = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->bedrooms = new ArrayCollection();
        $this->photos = new ArrayCollection();
        $this->housingEquipment = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
        return $this->maxTraveler;
    }

    public function setMaxTraveler(int $maxTraveler): self
    {
        $this->maxTraveler = $maxTraveler;

        return $this;
    }

    public function getBathroomNumber(): ?int
    {
        return $this->bathroomNumber;
    }

    public function setBathroomNumber(int $bathroomNumber): self
    {
        $this->bathroomNumber = $bathroomNumber;

        return $this;
    }

    public function getDefaultPrice(): ?float
    {
        return $this->defaultPrice;
    }

    public function setDefaultPrice(float $defaultPrice): self
    {
        $this->defaultPrice = $defaultPrice;

        return $this;
    }

    public function getMinDays(): ?int
    {
        return $this->minDays;
    }

    public function setMinDays(int $minDays): self
    {
        $this->minDays = $minDays;

        return $this;
    }

    public function getTravelerSupp(): ?int
    {
        return $this->travelerSupp;
    }

    public function setTravelerSupp(int $travelerSupp): self
    {
        $this->travelerSupp = $travelerSupp;

        return $this;
    }

    public function getSuppPrice(): ?float
    {
        return $this->suppPrice;
    }

    public function setSuppPrice(float $suppPrice): self
    {
        $this->suppPrice = $suppPrice;

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

    public function getOwner(): ?Owner
    {
        return $this->owner;
    }

    public function setOwner(?Owner $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection|Alert[]
     */
    public function getAlerts(): Collection
    {
        return $this->alerts;
    }

    public function addAlert(Alert $alert): self
    {
        if (!$this->alerts->contains($alert)) {
            $this->alerts[] = $alert;
            $alert->setHousing($this);
        }

        return $this;
    }

    public function removeAlert(Alert $alert): self
    {
        if ($this->alerts->contains($alert)) {
            $this->alerts->removeElement($alert);
            // set the owning side to null (unless already changed)
            if ($alert->getHousing() === $this) {
                $alert->setHousing(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Booking[]
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings[] = $booking;
            $booking->setHousing($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->contains($booking)) {
            $this->bookings->removeElement($booking);
            // set the owning side to null (unless already changed)
            if ($booking->getHousing() === $this) {
                $booking->setHousing(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Review[]
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->setHousing($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->contains($review)) {
            $this->reviews->removeElement($review);
            // set the owning side to null (unless already changed)
            if ($review->getHousing() === $this) {
                $review->setHousing(null);
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
            $bedroom->setHousing($this);
        }

        return $this;
    }

    public function removeBedroom(Bedroom $bedroom): self
    {
        if ($this->bedrooms->contains($bedroom)) {
            $this->bedrooms->removeElement($bedroom);
            // set the owning side to null (unless already changed)
            if ($bedroom->getHousing() === $this) {
                $bedroom->setHousing(null);
            }
        }

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
            $photo->setHousing($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->contains($photo)) {
            $this->photos->removeElement($photo);
            // set the owning side to null (unless already changed)
            if ($photo->getHousing() === $this) {
                $photo->setHousing(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|HousingEquipment[]
     */
    public function getHousingEquipment(): Collection
    {
        return $this->housingEquipment;
    }

    public function addHousingEquipment(HousingEquipment $housingEquipment): self
    {
        if (!$this->housingEquipment->contains($housingEquipment)) {
            $this->housingEquipment[] = $housingEquipment;
            $housingEquipment->setHousing($this);
        }

        return $this;
    }

    public function removeHousingEquipment(HousingEquipment $housingEquipment): self
    {
        if ($this->housingEquipment->contains($housingEquipment)) {
            $this->housingEquipment->removeElement($housingEquipment);
            // set the owning side to null (unless already changed)
            if ($housingEquipment->getHousing() === $this) {
                $housingEquipment->setHousing(null);
            }
        }

        return $this;
    }
    

}
