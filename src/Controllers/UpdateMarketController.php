<?php

namespace App\Controllers;

use App\Entities\MarketItem;
use App\Manager;

class UpdateMarketController
{
    /**
     * @return MarketItem[]
     */
    public function updateMarket(): array
    {
        $entityManager = Manager::get();
        /** @var MarketItem[] $marketItems */
        $marketItems = $entityManager
            ->getRepository(MarketItem::class)
            ->findMarketAvailable();

        foreach ($marketItems as $marketItem) {
            $marketItem->setPrice(rand(
                $marketItem->getCharacter()->getMarketData()->getMinPrice(),
                $marketItem->getCharacter()->getMarketData()->getMaxPrice()
            ));
        }

        $entityManager->flush();

        return $marketItems;
    }
}