<?php

namespace src\Controllers;

use App\Controllers\UpdateMarketController;
use App\Entities\Character;
use App\Entities\MarketItem;
use App\Manager;
use PHPUnit\Framework\TestCase;

final class UpdateMarketControllerTest extends TestCase
{
    /** @test */
    public function returnOnlyAvailableItems()
    {
        $controller = new UpdateMarketController();
        $marketItems = $controller->updateMarket();
        $this->assertIsArray($marketItems);
        $this->assertInstanceOf(MarketItem::class, $marketItems[0]);
        $this->assertTrue($marketItems[0]->getCharacter()->getMarketData()->isAvailable());
    }

    /** @test */
    public function isPriceUpdated()
    {
        $maxPrice = '200';
        $minPrice = '100';
        $entityManager = Manager::get();
        /** @var Character[] $characters */
        $characters = $entityManager->getRepository(Character::class)->findAvailables();
        $characters[0]->getMarketItem()->setPrice('0');
        $characters[0]->getMarketData()->setMaxPrice($maxPrice);
        $characters[0]->getMarketData()->setMinPrice($minPrice);
        $entityManager->flush();

        $controller = new UpdateMarketController();
        $controller->updateMarket();
        /** @var MarketItem $marketItem */
        $marketItem = $entityManager->getRepository(MarketItem::class)->findOneBy([
            'character' => $characters[0]
        ]);
        $this->assertGreaterThanOrEqual($minPrice, $marketItem->getPrice());
        $this->assertLessThanOrEqual($maxPrice, $marketItem->getPrice());
    }
}
