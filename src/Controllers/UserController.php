<?php

namespace App\Controllers;

use App\Entities\User;
use App\Manager;

class UserController
{
    public function list()
    {
        $entityManager = Manager::get();
        $users = $entityManager->getRepository(User::class)->findAll();

        return json_encode($users);
    }
}
