<?php

namespace src\Controllers;

use App\Controllers\MarketController;
use App\Entities\Character;
use App\Entities\MarketItem;
use App\Entities\Team;
use App\Entities\User;
use App\Manager;
use PHPUnit\Framework\TestCase;

final class MarketControllerTest extends TestCase
{
    /** @test */
    public function returnOnlyAvailableItems()
    {
        $controller = new MarketController();
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

        $controller = new MarketController();
        $controller->updateMarket();
        /** @var MarketItem $marketItem */
        $marketItem = $entityManager->getRepository(MarketItem::class)->findOneBy([
            'character' => $characters[0]
        ]);
        $this->assertGreaterThanOrEqual($minPrice, $marketItem->getPrice());
        $this->assertLessThanOrEqual($maxPrice, $marketItem->getPrice());
    }

    /** @test */
    public function verifyBuyAddsCharacterIntoTeam()
    {
        $budget = 100;
        $spent = 0;
        $price = 50;
        $entities = $this->prepareBuyData($budget, $spent, $price);

        $controller = new MarketController();
        $jsonArray = $controller->buyCharacter($entities['team']->getId(), $entities['character']->getId());
        self::assertSame('ok', $jsonArray['status']);

        $entityManager = Manager::get();
        /** @var Team $team */
        $team = $entityManager->getRepository(Team::class)->find($entities['team']->getId());
        $character = $entityManager->getRepository(Character::class)->find($entities['character']->getId());
        self::assertTrue(in_array($character, (array)$team->getCharacters()));
    }

    /** @test */
    public function verifyBudgetIsUpdated()
    {
        $budget = 100;
        $spent = 0;
        $price = 50;
        $entities = $this->prepareBuyData($budget, $spent, $price);

        $controller = new MarketController();
        $jsonArray = $controller->buyCharacter($entities['team']->getId(), $entities['character']->getId());
        self::assertSame('ok', $jsonArray['status']);

        $entityManager = Manager::get();
        /** @var Team $team */
        $team = $entityManager->getRepository(Team::class)->find($entities['team']->getId());
        $budget = $team->getUser()->getBudget();
        self::assertSame((string)($spent + $price), $budget->getSpent());
    }

    /** @test */
    public function verifyBudgetIsNotExceeded()
    {
        $budget = 100;
        $spent = 100;
        $price = 21;
        $entities = $this->prepareBuyData($budget, $spent, $price);

        $controller = new MarketController();
        $jsonArray = $controller->buyCharacter($entities['team']->getId(), $entities['character']->getId());
        self::assertSame('error', $jsonArray['status']);
        self::assertSame(MarketController::MESSAGE_BUDGET_HAS_BEED_EXCEEDED, $jsonArray['message']);
    }

    /** @test */
    public function verifyNotCompletedIfAlreadyInTeam()
    {
        $budget = 100;
        $spent = 0;
        $price = 50;
        $entities = $this->prepareBuyData($budget, $spent, $price);
        /** @var Team $team */
        $team = $entities['team'];
        $team->addCharacter($entities['character']);
        Manager::get()->flush();

        $controller = new MarketController();
        $jsonArray = $controller->buyCharacter($entities['team']->getId(), $entities['character']->getId());
        self::assertSame('error', $jsonArray['status']);
        self::assertSame(MarketController::MESSAGE_ALREADY_BOUGHT, $jsonArray['message']);
    }

    private function prepareBuyData(int $budget, int $spent, int $price): array
    {
        $entityManger = Manager::get();
        /** @var User $user */
        $user = $entityManger->getRepository(User::class)->findOneBy([]);
        $user->getBudget()->setTotal($budget);
        $user->getBudget()->setSpent($spent);

        $team = new Team();
        $team->setUser($user);
        $team->setName('bar');
        $entityManger->persist($team);

        /** @var Character $character */
        $character = $entityManger->getRepository(Character::class)->findOneBy([]);
        $character->getMarketItem()->setPrice($price);
        $entityManger->flush();

        return ['team' => $team, 'character' => $character];
    }
}
