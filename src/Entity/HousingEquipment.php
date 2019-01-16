<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HousingEquipmentRepository")
 */
class HousingEquipment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Housing")
     * @ORM\JoinColumn(nullable=false)
     */
    private $housing_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipment")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipment_id;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEquipmentId(): ?Equipment
    {
        return $this->equipment_id;
    }

    public function setEquipmentId(?Equipment $equipment_id): self
    {
        $this->equipment_id = $equipment_id;

        return $this;
    }
}
