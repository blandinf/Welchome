<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipmentRepository")
 */
class Equipment
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
     * @ORM\Column(type="string", length=255)
     */
    private $iconUrl;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HousingEquipment", mappedBy="equipment", orphanRemoval=true)
     */
    private $housingEquipment;

    public function __construct()
    {
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

    public function getIconUrl(): ?string
    {
        return $this->iconUrl;
    }

    public function setIconUrl(string $iconUrl): self
    {
        $this->iconUrl = $iconUrl;

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
            $housingEquipment->setEquipment($this);
        }

        return $this;
    }

    public function removeHousingEquipment(HousingEquipment $housingEquipment): self
    {
        if ($this->housingEquipment->contains($housingEquipment)) {
            $this->housingEquipment->removeElement($housingEquipment);
            // set the owning side to null (unless already changed)
            if ($housingEquipment->getEquipment() === $this) {
                $housingEquipment->setEquipment(null);
            }
        }

        return $this;
    }
}
