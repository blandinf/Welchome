<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BedroomRepository")
 */
class Bedroom
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Housing", inversedBy="bedrooms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $housing_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?bool
    {
        return $this->type;
    }

    public function setType(bool $type): self
    {
        $this->type = $type;

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
}
