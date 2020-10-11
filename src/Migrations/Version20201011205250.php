<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201011205250 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $sqlBudget = <<<SQL
INSERT INTO `Budget` (`id`, `user_id`, `total`) VALUES (1, 1, '5000');
INSERT INTO `Budget` (`id`, `user_id`, `total`) VALUES (2, 2, '9000');
INSERT INTO `Budget` (`id`, `user_id`, `total`) VALUES (3, 3, '5000');
INSERT INTO `Budget` (`id`, `user_id`, `total`) VALUES (4, 4, '9000');
INSERT INTO `Budget` (`id`, `user_id`, `total`) VALUES (5, 5, '4000');
INSERT INTO `Budget` (`id`, `user_id`, `total`) VALUES (6, 6, '6000');
INSERT INTO `Budget` (`id`, `user_id`, `total`) VALUES (7, 7, '7000');
INSERT INTO `Budget` (`id`, `user_id`, `total`) VALUES (8, 8, '9000');
INSERT INTO `Budget` (`id`, `user_id`, `total`) VALUES (9, 9, '9000');
INSERT INTO `Budget` (`id`, `user_id`, `total`) VALUES (10, 10, '1000');
SQL;
        $sqlCharacterMarketData = <<<SQL
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (1, 1, 0, '1505', '613.7');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (2, 2, 1, '1402.51', '679.59');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (3, 3, 0, '1607.41', '214');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (4, 4, 1, '1387.38', '105.92');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (5, 5, 0, '1393.19', '880.4');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (6, 6, 1, '1106.49', '804.02');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (7, 7, 0, '1292.55', '545.27');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (8, 8, 1, '1307.59', '723.93');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (9, 9, 0, '1477.05', '579.65');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (10, 10, 1, '1532.37', '409.19');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (11, 11, 0, '1217.01', '815.31');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (12, 12, 1, '1956.06', '518');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (13, 13, 0, '1940.52', '899.66');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (14, 14, 1, '1128.7', '716.75');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (15, 15, 0, '1268.27', '41.96');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (16, 16, 1, '1910.46', '170.66');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (17, 17, 0, '1924.82', '134.61');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (18, 18, 1, '1657.9', '740.25');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (19, 19, 0, '1798.97', '66.89');
INSERT INTO `CharacterMarketData` (`id`, `character_id`, `available`, `maxPrice`, `minPrice`) VALUES (20, 20, 1, '1311.91', '313.97');
SQL;
        $sqlMarketItem = <<<SQL
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (1, 1, '1505.00');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (2, 2, '1402.51');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (3, 3, '1607.41');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (4, 4, '1387.38');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (5, 5, '1393.19');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (6, 6, '1106.49');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (7, 7, '1292.55');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (8, 8, '1307.59');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (9, 9, '1477.05');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (10, 10, '1532.37');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (11, 11, '1217.01');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (12, 12, '1956.06');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (13, 13, '1940.52');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (14, 14, '1128.7');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (15, 15, '1268.27');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (16, 16, '1910.46');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (17, 17, '1924.82');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (18, 18, '1657.9');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (19, 19, '1798.97');
INSERT INTO `MarketItem` (`id`, `character_id`, `price`) VALUES (20, 20, '1311.91');
SQL;

        $sqlCharacterMetadata = <<<SQL
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (1, 1, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (2, 2, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (3, 3, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (4, 4, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (5, 5, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (6, 6, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (7, 7, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (8, 8, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (9, 9, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (10, 10, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (11, 11, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (12, 12, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (13, 13, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (14, 14, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (15, 15, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (16, 16, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (17, 17, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (18, 18, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (19, 19, 0, 0, 0);
INSERT INTO `CharacterMetadata` (`id`, `character_id`, `strength`, `agility`, `luck`) VALUES (20, 20, 0, 0, 0);
SQL;
        $sqlCharacter = <<<SQL
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (1, 'voluptatem', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (2, 'qui', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (3, 'pariatur', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (4, 'aut', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (5, 'animi', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (6, 'esse', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (7, 'dolor', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (8, 'corrupti', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (9, 'laudantium', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (10, 'quia', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (11, 'ad', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (12, 'eos', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (13, 'dolor', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (14, 'ratione', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (15, 'quas', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (16, 'consequatur', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (17, 'praesentium', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (18, 'in', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (19, 'sed', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg');
INSERT INTO `GameCharacter` (`id`, `name`, `photoUrl`) VALUES (20, 'id', 'https://thumbs.dreamstime.com/z/jugador-de-f%C3%BAtbol-sexo-masculino-futbolista-character-en-el-funcionamiento-uniforme-los-deportes-con-ejemplo-del-vector-la-bola-140648054.jpg'); 
SQL;
        $sqlUser = <<<SQL
INSERT INTO `User` (`id`, `name`) VALUES (1, 'voluptatem');
INSERT INTO `User` (`id`, `name`) VALUES (2, 'alias');
INSERT INTO `User` (`id`, `name`) VALUES (3, 'incidunt');
INSERT INTO `User` (`id`, `name`) VALUES (4, 'culpa');
INSERT INTO `User` (`id`, `name`) VALUES (5, 'beatae');
INSERT INTO `User` (`id`, `name`) VALUES (6, 'expedita');
INSERT INTO `User` (`id`, `name`) VALUES (7, 'omnis');
INSERT INTO `User` (`id`, `name`) VALUES (8, 'velit');
INSERT INTO `User` (`id`, `name`) VALUES (9, 'temporibus');
INSERT INTO `User` (`id`, `name`) VALUES (10, 'temporibus');
SQL;

        $this->addSql($sqlUser);
        $this->addSql($sqlBudget);
        $this->addSql($sqlCharacter);
        $this->addSql($sqlCharacterMarketData);
        $this->addSql($sqlMarketItem);
        $this->addSql($sqlCharacterMetadata);
    }

    public function down(Schema $schema) : void
    {
        $sqlBudget = <<<SQL
DELETE * FROM Budget;
SQL;
        $sqlCharacterMarketData = <<<SQL
DELETE * FROM CharacterMarketData;
SQL;
        $sqlCharacterMarketData = <<<SQL
DELETE * FROM MarketItem;
SQL;
        $sqlCharacterMetadata = <<<SQL
DELETE * FROM CharacterMetadata;
SQL;
        $sqlCharacter = <<<SQL
DELETE * FROM GameCharacter;
SQL;
        $sqlUser = <<<SQL
DELETE * FROM User;
SQL;
        $this->addSql($sqlBudget);
        $this->addSql($sqlCharacterMarketData);
        $this->addSql($sqlMarketItem);
        $this->addSql($sqlCharacterMetadata);
        $this->addSql($sqlCharacter);
        $this->addSql($sqlUser);
    }
}
