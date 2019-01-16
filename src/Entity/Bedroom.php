<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Housing", inversedBy="bedrooms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $housing;

    /**
     * @ORM\Column(type="boolean")
     */
    private $common;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bed", mappedBy="bedroom", orphanRemoval=true)
     */
    private $beds;
    

    public function __construct()
    {
        $this->beds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHousing(): ?Housing
    {
        return $this->housing;
    }

    public function setHousing(?Housing $housing): self
    {
        $this->housing = $housing;

        return $this;
    }

    public function getCommon(): ?bool
    {
        return $this->common;
    }

    public function setCommon(bool $common): self
    {
        $this->common = $common;

        return $this;
    }

    /**
     * @return Collection|Bed[]
     */
    public function getBeds(): Collection
    {
        return $this->beds;
    }

    public function addBed(Bed $bed): self
    {
        if (!$this->beds->contains($bed)) {
            $this->beds[] = $bed;
            $bed->setBedroom($this);
        }

        return $this;
    }

    public function removeBed(Bed $bed): self
    {
        if ($this->beds->contains($bed)) {
            $this->beds->removeElement($bed);
            // set the owning side to null (unless already changed)
            if ($bed->getBedroom() === $this) {
                $bed->setBedroom(null);
            }
        }

        return $this;
    }

}
