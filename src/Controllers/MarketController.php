<?php

namespace App\Controllers;

use App\Entities\Character;
use App\Entities\MarketItem;
use App\Entities\Team;
use App\Manager;

class MarketController
{
    const MESSAGE_BUDGET_HAS_BEED_EXCEEDED = 'The budget has beed exceeded';
    const LIMIT_DEBT = 1.2;
    const MESSAGE_ALREADY_BOUGHT = 'The character is already in the team';
    const MESSAGE_BUY_SUCCESS = 'The character has been added into the team';

    /**
     * @return MarketItem[]
     */
    public function updateMarket(): string
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

        return json_encode($marketItems);
    }

    public function buyCharacter(int $teamId, int $characterId)
    {
        $entityManager = Manager::get();
        /** @var Team $team */
        $team = $entityManager->getRepository(Team::class)->find($teamId);
        /** @var Character $character */
        $character = $entityManager->getRepository(Character::class)->find($characterId);

        $budget = $team->getUser()->getBudget();
        $spent = (float)$budget->getSpent();
        $limit = (float)$budget->getTotal() * self::LIMIT_DEBT;
        $characterPrice = (float)$character->getMarketItem()->getPrice();
        if (($characterPrice + $spent) > $limit) {
            return json_encode(['status' => 'error', 'message' => self::MESSAGE_BUDGET_HAS_BEED_EXCEEDED]);
        }

        if ($team->getCharacters()->contains($character)) {
            return json_encode(['status' => 'error', 'message' => self::MESSAGE_ALREADY_BOUGHT]);
        }

        $team->addCharacter($character);
        $budget->setSpent($spent + $characterPrice);
        $entityManager->flush();
        return json_encode(['status' => 'ok', 'message' => self::MESSAGE_BUY_SUCCESS]);
    }
}
