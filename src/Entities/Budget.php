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
class Budget implements JsonSerializable
{
    const TOTAL_DEFAULT = '1000';

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @Column(length=15)
     */
    private string $total = self::TOTAL_DEFAULT;

    /**
     * @Column(length=15)
     */
    private string $spent = '0';

    /**
     * @OneToOne(targetEntity="User", inversedBy="budget")
     */
    private User $user;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(string $total): void
    {
        $this->total = $total;
    }

    public function getSpent(): string
    {
        return $this->spent;
    }

    public function setSpent(string $spent): void
    {
        $this->spent = $spent;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'total' => $this->total,
            'spent' => $this->spent
        ];
    }
}
