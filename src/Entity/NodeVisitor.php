<?php

namespace App\Entity;

use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 * @OGM\Node(label="User")
 * Class Person
 * @package App\Entity
 */
class NodeVisitor
{
    /**  @OGM\GraphId() */
    protected $id;

    /**  @OGM\Property(type="string") */
    protected $name;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
}