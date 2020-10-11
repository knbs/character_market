<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\PersistentCollection;

/**
 * @Entity
 */
class Team
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @Column(length=150)
     */
    private string $name;

    /**
     * @ManyToOne(targetEntity="User")
     */
    private User $user;

    /**
     * @ManyToMany(targetEntity="Character", mappedBy="teams")
     */
    private PersistentCollection $characters;

    public function __construct()
    {
        $this->characters = new PersistentCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCharacters(): PersistentCollection
    {
        return $this->characters;
    }

    public function setCharacters(PersistentCollection $characters): void
    {
        $this->characters = $characters;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}