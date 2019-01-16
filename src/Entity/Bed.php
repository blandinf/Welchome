<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BedRepository")
 */
class Bed
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
    private $type;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Bedroom", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $room_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRoomId(): ?Bedroom
    {
        return $this->room_id;
    }

    public function setRoomId(Bedroom $room_id): self
    {
        $this->room_id = $room_id;

        return $this;
    }
}
