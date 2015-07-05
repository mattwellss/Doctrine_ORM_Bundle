<?php
/**
 * @Entity
 * @Table(name="entity")
 */
class Entity
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}
