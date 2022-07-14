<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220714142915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE personnalite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, alias VARCHAR(255) DEFAULT NULL, sexe INT NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnalite_profession (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, profession_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnalite_profession_personnalite (personnalite_profession_id INT NOT NULL, personnalite_id INT NOT NULL, INDEX IDX_B002D9C0A1D29AEF (personnalite_profession_id), INDEX IDX_B002D9C02E282BF5 (personnalite_id), PRIMARY KEY(personnalite_profession_id, personnalite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personnalite_profession_personnalite ADD CONSTRAINT FK_B002D9C0A1D29AEF FOREIGN KEY (personnalite_profession_id) REFERENCES personnalite_profession (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnalite_profession_personnalite ADD CONSTRAINT FK_B002D9C02E282BF5 FOREIGN KEY (personnalite_id) REFERENCES personnalite (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnalite_profession_personnalite DROP FOREIGN KEY FK_B002D9C02E282BF5');
        $this->addSql('ALTER TABLE personnalite_profession_personnalite DROP FOREIGN KEY FK_B002D9C0A1D29AEF');
        $this->addSql('DROP TABLE personnalite');
        $this->addSql('DROP TABLE personnalite_profession');
        $this->addSql('DROP TABLE personnalite_profession_personnalite');
    }
}
