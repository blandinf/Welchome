<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlertRepository")
 */
class Alert
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Housing", inversedBy="alerts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $housing;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="alerts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeAlert")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeAlert;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTypeAlert(): ?TypeAlert
    {
        return $this->typeAlert;
    }

    public function setTypeAlert(?TypeAlert $typeAlert): self
    {
        $this->typeAlert = $typeAlert;

        return $this;
    }
}
