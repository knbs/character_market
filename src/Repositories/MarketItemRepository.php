<?php

namespace App\Repositories;

use App\Entities\Character;
use App\Entities\CharacterMarketData;
use App\Entities\MarketItem;
use Doctrine\ORM\EntityRepository;

class MarketItemRepository extends EntityRepository
{
    public function findMarketAvailable()
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();
        return $queryBuilder->select('mi')
            ->from(MarketItem::class, 'mi')
            ->join(Character::class, 'c', 'WITH', 'mi.character = c')
            ->join(CharacterMarketData::class, 'cmd', 'WITH', 'cmd.character = c')
            ->where('cmd.available = true')
            ->getQuery()
            ->getResult();
    }
}