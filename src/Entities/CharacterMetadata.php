<?php

namespace App\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * @Entity
 */
class CharacterMetadata
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @Column(type="integer")
     */
    private int $strength;

    /**
     * @Column(type="integer")
     */
    private int $agility;

    /**
     * @Column(type="integer")
     */
    private int $luck;

    /**
     * @OneToOne(targetEntity="Character", inversedBy="metadata")
     */
    private Character $character;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): void
    {
        $this->strength = $strength;
    }

    public function getAgility(): int
    {
        return $this->agility;
    }

    public function setAgility(int $agility): void
    {
        $this->agility = $agility;
    }

    public function getLuck(): int
    {
        return $this->luck;
    }

    public function setLuck(int $luck): void
    {
        $this->luck = $luck;
    }

    public function getCharacter(): Character
    {
        return $this->character;
    }

    public function setCharacter(Character $character): void
    {
        $this->character = $character;
    }
}
