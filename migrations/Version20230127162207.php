<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230127162207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film ADD ordre_chrono INT NOT NULL');
        $this->addSql('ALTER TABLE jeu ADD ordre_chrono INT NOT NULL');
        $this->addSql('ALTER TABLE livre ADD ordre_chrono INT NOT NULL');
        $this->addSql('ALTER TABLE musique ADD ordre_chrono INT NOT NULL');
        $this->addSql('ALTER TABLE serie ADD ordre_chrono INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film DROP ordre_chrono');
        $this->addSql('ALTER TABLE jeu DROP ordre_chrono');
        $this->addSql('ALTER TABLE livre DROP ordre_chrono');
        $this->addSql('ALTER TABLE musique DROP ordre_chrono');
        $this->addSql('ALTER TABLE serie DROP ordre_chrono');
    }
}
