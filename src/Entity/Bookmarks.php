<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookmarksRepository")
 */
class Bookmarks
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Housing")
     */
    private $housing_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="bookmarks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;

    public function __construct()
    {
        $this->housing_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Housing[]
     */
    public function getHousingId(): Collection
    {
        return $this->housing_id;
    }

    public function addHousingId(Housing $housingId): self
    {
        if (!$this->housing_id->contains($housingId)) {
            $this->housing_id[] = $housingId;
        }

        return $this;
    }

    public function removeHousingId(Housing $housingId): self
    {
        if ($this->housing_id->contains($housingId)) {
            $this->housing_id->removeElement($housingId);
        }

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
