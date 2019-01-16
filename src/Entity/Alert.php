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
     * @ORM\ManyToOne(targetEntity="App\Entity\Housing")
     * @ORM\JoinColumn(nullable=false)
     */
    private $housing_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="alerts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeAlert")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type_alert_id;

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

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getTypeAlertId(): ?TypeAlert
    {
        return $this->type_alert_id;
    }

    public function setTypeAlertId(?TypeAlert $type_alert_id): self
    {
        $this->type_alert_id = $type_alert_id;

        return $this;
    }
}
