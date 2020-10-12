<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\PersistentCollection;
use JsonSerializable;

/**
 * @Entity
 */
class User implements JsonSerializable
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @Column(length=200, nullable=true)
     */
    private string $name;

    /**
     * @OneToOne(targetEntity="Budget", mappedBy="user")
     */
    private Budget $budget;

    /**
     * @OneToMany(targetEntity="Team", mappedBy="user")
     */
    private Collection $teams;

    public function __construct()
    {
        $this->teams = new ArrayCollection();
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

    public function getBudget(): Budget
    {
        return $this->budget;
    }

    public function setBudget(Budget $budget): void
    {
        $this->budget = $budget;
    }

    public function getTeams()
    {
        return $this->teams;
    }

    public function setTeams($teams): void
    {
        $this->teams = $teams;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'budget' => $this->budget,
            'teams' => $this->teams->toArray(),
        ];
    }
}
