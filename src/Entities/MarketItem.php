<?php

namespace App\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToOne;
use JsonSerializable;

/**
 * @Entity(repositoryClass="App\Repositories\MarketItemRepository")
 */
class MarketItem implements JsonSerializable
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @Column(length=15)
     */
    private string $price;

    /**
     * @OneToOne(targetEntity="Character")
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

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
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
            'price' => $this->price,
            'characterId' => $this->character->getId(),
            'name' => $this->character->getName(),
            'photo' => $this->character->getPhotoUrl()
        ];
    }
}
