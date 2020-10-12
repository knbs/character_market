<?php

namespace App\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToOne;
use JsonSerializable;

/**
 * @Entity
 */
class CharacterMarketData implements JsonSerializable
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @Column(type="boolean")
     */
    private bool $available;

    /**
     * @Column(length=15)
     */
    private string $maxPrice;

    /**
     * @Column(length=15)
     */
    private string $minPrice;

    /**
     * @OneToOne(targetEntity="Character", inversedBy="marketData")
     */
    private Character $character;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function isAvailable(): bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): void
    {
        $this->available = $available;
    }

    public function getMaxPrice(): string
    {
        return $this->maxPrice;
    }

    public function setMaxPrice(string $maxPrice): void
    {
        $this->maxPrice = $maxPrice;
    }

    public function getMinPrice(): string
    {
        return $this->minPrice;
    }

    public function setMinPrice(string $minPrice): void
    {
        $this->minPrice = $minPrice;
    }

    public function getCharacter(): Character
    {
        return $this->character;
    }

    public function setCharacter(Character $character): void
    {
        $this->character = $character;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'available' => $this->available,
            'maxPrice' => $this->maxPrice,
            'minPrice' => $this->minPrice
        ];
    }
}
