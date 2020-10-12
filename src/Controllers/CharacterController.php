<?php

namespace App\Controllers;

use App\Entities\Character;
use App\Manager;

class CharacterController
{
    public function list()
    {
        $entityManager = Manager::get();
        $characters = $entityManager->getRepository(Character::class)->findAll();

        return json_encode($characters);
    }

    public function setMinPrice($id, $price)
    {
        $entityManager = Manager::get();
        /** @var Character $character */
        $character = $entityManager->getRepository(Character::class)->find($id);
        $marketData = $character->getMarketData();
        if ($price > $marketData->getMaxPrice()) {
            return json_encode(['status' => 'error', 'message' => 'price should be lower than current Max']);
        }

        $character->getMarketData()->setMinPrice($price);
        $entityManager->flush();

        return json_encode(['status' => 'ok', 'message' => 'Updated!!! =D']);
    }

    public function setMaxPrice($id, $price)
    {
        $entityManager = Manager::get();
        /** @var Character $character */
        $character = $entityManager->getRepository(Character::class)->find($id);
        $marketData = $character->getMarketData();
        if ($price < $marketData->getMinPrice()) {
            return json_encode(['status' => 'error', 'message' => 'price should be greater than current Min']);
        }

        $character->getMarketData()->setMaxPrice($price);
        $entityManager->flush();

        return json_encode(['status' => 'ok', 'message' => 'Updated!!! =D']);
    }

    public function setAvailable($id, $state)
    {
        $entityManager = Manager::get();
        /** @var Character $character */
        $character = $entityManager->getRepository(Character::class)->find($id);
        $character->getMarketData()->setAvailable(!!(int)$state);
        $entityManager->flush();

        return json_encode(['status' => 'ok', 'message' => 'Updated!!! =D']);
    }
}
