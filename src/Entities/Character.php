<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\PersistentCollection;
use JsonSerializable;

/**
 * @Entity(repositoryClass="App\Repositories\CharacterRepository")
 * @Table(name="GameCharacter")
 */
class Character implements JsonSerializable
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
     * @Column(length=300)
     */
    private string $photoUrl;

    /**
     * @OneToOne(targetEntity="CharacterMetadata", mappedBy="character")
     */
    private CharacterMetadata $metadata;

    /**
     * @OneToOne(targetEntity="CharacterMarketData", mappedBy="character")
     */
    private CharacterMarketData $marketData;

    /**
     * @OneToOne(targetEntity="MarketItem", mappedBy="character")
     */
    private MarketItem $marketItem;

    /**
     * @ManyToMany(targetEntity="Team", inversedBy="characters")
     * @JoinTable(name="TeamCharacters")
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

    public function getPhotoUrl(): string
    {
        return $this->photoUrl;
    }

    public function setPhotoUrl(string $photoUrl): void
    {
        $this->photoUrl = $photoUrl;
    }

    public function getMetadata(): CharacterMetadata
    {
        return $this->metadata;
    }

    public function setMetadata(CharacterMetadata $metadata): void
    {
        $this->metadata = $metadata;
    }

    public function getMarketData(): CharacterMarketData
    {
        return $this->marketData;
    }

    public function setMarketData(CharacterMarketData $marketData): void
    {
        $this->marketData = $marketData;
    }

    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function setTeams(Collection $teams): void
    {
        $this->teams = $teams;
    }

    public function getMarketItem(): MarketItem
    {
        return $this->marketItem;
    }

    public function setMarketItem(MarketItem $marketItem): void
    {
        $this->marketItem = $marketItem;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'photo' => $this->photoUrl,
            'metadata' => $this->metadata,
            'marketData' => $this->marketData
        ];
    }
}
