<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $start_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $end_date;

    /**
     * @ORM\Column(type="integer")
     */
    private $children_number;

    /**
     * @ORM\Column(type="integer")
     */
    private $baby_number;

    /**
     * @ORM\Column(type="integer")
     */
    private $adult_number;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Housing")
     * @ORM\JoinColumn(nullable=false)
     */
    private $housing_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getChildrenNumber(): ?int
    {
        return $this->children_number;
    }

    public function setChildrenNumber(int $children_number): self
    {
        $this->children_number = $children_number;

        return $this;
    }

    public function getBabyNumber(): ?int
    {
        return $this->baby_number;
    }

    public function setBabyNumber(int $baby_number): self
    {
        $this->baby_number = $baby_number;

        return $this;
    }

    public function getAdultNumber(): ?int
    {
        return $this->adult_number;
    }

    public function setAdultNumber(int $adult_number): self
    {
        $this->adult_number = $adult_number;

        return $this;
    }

    public function getHousingId(): ?Housing
    {
        return $this->housing_id;
    }

    public function setHousingId(?Housing $housing_id): self
    {
        $this->housing_id = $housing_id;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }
}
