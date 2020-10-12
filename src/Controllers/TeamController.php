<?php

namespace App\Controllers;

use App\Entities\Team;
use App\Entities\User;
use App\Manager;

class TeamController
{
    public function createTeam(int $userId, string $name): string
    {
        $entityManger = Manager::get();
        $team = new Team();
        $team->setUser($entityManger->getRepository(User::class)->find($userId));
        $team->setName($name);
        $entityManger->persist($team);
        $entityManger->flush();

        return json_encode($team);
    }

    public function show(int $id)
    {
        $entityManger = Manager::get();
        $team = $entityManger->getRepository(Team::class)->find($id);

        return json_encode($team);
    }
}
