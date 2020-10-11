<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201011205159 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Budget (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, total VARCHAR(15) NOT NULL, UNIQUE INDEX UNIQ_745EF24DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE CharacterMarketData (id INT AUTO_INCREMENT NOT NULL, character_id INT DEFAULT NULL, available TINYINT(1) NOT NULL, maxPrice VARCHAR(15) NOT NULL, minPrice VARCHAR(15) NOT NULL, UNIQUE INDEX UNIQ_30B4D1E61136BE75 (character_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE CharacterMetadata (id INT AUTO_INCREMENT NOT NULL, character_id INT DEFAULT NULL, strength INT NOT NULL, agility INT NOT NULL, luck INT NOT NULL, UNIQUE INDEX UNIQ_852C05F81136BE75 (character_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE GameCharacter (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, photoUrl VARCHAR(300) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE TeamCharacters (character_id INT NOT NULL, team_id INT NOT NULL, INDEX IDX_428985FC1136BE75 (character_id), INDEX IDX_428985FC296CD8AE (team_id), PRIMARY KEY(character_id, team_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE MarketItem (id INT AUTO_INCREMENT NOT NULL, character_id INT DEFAULT NULL, price VARCHAR(15) NOT NULL, UNIQUE INDEX UNIQ_6E1472A91136BE75 (character_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Team (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, INDEX IDX_64D20921A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE User (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(200) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Budget ADD CONSTRAINT FK_745EF24DA76ED395 FOREIGN KEY (user_id) REFERENCES User (id)');
        $this->addSql('ALTER TABLE CharacterMarketData ADD CONSTRAINT FK_30B4D1E61136BE75 FOREIGN KEY (character_id) REFERENCES GameCharacter (id)');
        $this->addSql('ALTER TABLE CharacterMetadata ADD CONSTRAINT FK_852C05F81136BE75 FOREIGN KEY (character_id) REFERENCES GameCharacter (id)');
        $this->addSql('ALTER TABLE TeamCharacters ADD CONSTRAINT FK_428985FC1136BE75 FOREIGN KEY (character_id) REFERENCES GameCharacter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE TeamCharacters ADD CONSTRAINT FK_428985FC296CD8AE FOREIGN KEY (team_id) REFERENCES Team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE MarketItem ADD CONSTRAINT FK_6E1472A91136BE75 FOREIGN KEY (character_id) REFERENCES GameCharacter (id)');
        $this->addSql('ALTER TABLE Team ADD CONSTRAINT FK_64D20921A76ED395 FOREIGN KEY (user_id) REFERENCES User (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE CharacterMarketData DROP FOREIGN KEY FK_30B4D1E61136BE75');
        $this->addSql('ALTER TABLE CharacterMetadata DROP FOREIGN KEY FK_852C05F81136BE75');
        $this->addSql('ALTER TABLE TeamCharacters DROP FOREIGN KEY FK_428985FC1136BE75');
        $this->addSql('ALTER TABLE MarketItem DROP FOREIGN KEY FK_6E1472A91136BE75');
        $this->addSql('ALTER TABLE TeamCharacters DROP FOREIGN KEY FK_428985FC296CD8AE');
        $this->addSql('ALTER TABLE Budget DROP FOREIGN KEY FK_745EF24DA76ED395');
        $this->addSql('ALTER TABLE Team DROP FOREIGN KEY FK_64D20921A76ED395');
        $this->addSql('DROP TABLE Budget');
        $this->addSql('DROP TABLE CharacterMarketData');
        $this->addSql('DROP TABLE CharacterMetadata');
        $this->addSql('DROP TABLE GameCharacter');
        $this->addSql('DROP TABLE TeamCharacters');
        $this->addSql('DROP TABLE MarketItem');
        $this->addSql('DROP TABLE Team');
        $this->addSql('DROP TABLE User');
    }
}
