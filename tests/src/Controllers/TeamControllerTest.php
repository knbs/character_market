<?php

namespace src\Controllers;

use App\Controllers\TeamController;
use App\Entities\Team;
use App\Entities\User;
use App\Manager;
use PHPUnit\Framework\TestCase;

class TeamControllerTest extends TestCase
{
    /** @test */
    public function newTeamIsCreated()
    {
        $entityManager = Manager::get();
        /** @var User $user */
        $user = $entityManager->getRepository(User::class)->findOneBy([]);
        $teamsCountBefore = $entityManager->getRepository(Team::class)->count([]);
        $controller = new TeamController();
        $controller->createTeam($user->getId(), 'foo');
        $teamsCountAfter = $entityManager->getRepository(Team::class)->count([]);
        $this->assertSame($teamsCountBefore + 1, $teamsCountAfter);
    }

    /** @test */
    public function teamIsAssignedToUser()
    {
        $entityManager = Manager::get();
        /** @var User $user */
        $user = $entityManager->getRepository(User::class)->findOneBy([]);
        $controller = new TeamController();
        $response = json_decode($controller->createTeam($user->getId(), 'foo'), true);
        $team = $entityManager->getRepository(Team::class)->find($response['id']);
        $this->assertSame($team->getUser(), $user);
    }
}
