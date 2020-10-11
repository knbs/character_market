<?php

namespace App\Repositories;

use App\Entities\Character;
use App\Entities\CharacterMarketData;
use Doctrine\ORM\EntityRepository;

class CharacterRepository extends EntityRepository
{
    public function findAvailables()
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();
        return $queryBuilder->select('c')
            ->from(Character::class, 'c')
            ->join(CharacterMarketData::class, 'cmd', 'WITH', 'cmd.character = c')
            ->where('cmd.available = true')
            ->getQuery()
            ->getResult();
    }
}