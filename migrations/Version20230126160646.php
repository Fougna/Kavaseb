<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230126160646 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22DCCF6510 FOREIGN KEY (chronologie_id) REFERENCES chronologie (id)');
        $this->addSql('CREATE INDEX IDX_8244BE22DCCF6510 ON film (chronologie_id)');
        $this->addSql('ALTER TABLE jeu CHANGE chronologie chronologie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jeu ADD CONSTRAINT FK_82E48DB5DCCF6510 FOREIGN KEY (chronologie_id) REFERENCES chronologie (id)');
        $this->addSql('CREATE INDEX IDX_82E48DB5DCCF6510 ON jeu (chronologie_id)');
        $this->addSql('ALTER TABLE livre CHANGE chronologie chronologie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99DCCF6510 FOREIGN KEY (chronologie_id) REFERENCES chronologie (id)');
        $this->addSql('CREATE INDEX IDX_AC634F99DCCF6510 ON livre (chronologie_id)');
        $this->addSql('ALTER TABLE musique CHANGE chronologie chronologie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE musique ADD CONSTRAINT FK_EE1D56BCDCCF6510 FOREIGN KEY (chronologie_id) REFERENCES chronologie (id)');
        $this->addSql('CREATE INDEX IDX_EE1D56BCDCCF6510 ON musique (chronologie_id)');
        $this->addSql('ALTER TABLE serie CHANGE chronologie chronologie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A9334DCCF6510 FOREIGN KEY (chronologie_id) REFERENCES chronologie (id)');
        $this->addSql('CREATE INDEX IDX_AA3A9334DCCF6510 ON serie (chronologie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22DCCF6510');
        $this->addSql('DROP INDEX IDX_8244BE22DCCF6510 ON film');
        $this->addSql('ALTER TABLE jeu DROP FOREIGN KEY FK_82E48DB5DCCF6510');
        $this->addSql('DROP INDEX IDX_82E48DB5DCCF6510 ON jeu');
        $this->addSql('ALTER TABLE jeu CHANGE chronologie_id chronologie INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F99DCCF6510');
        $this->addSql('DROP INDEX IDX_AC634F99DCCF6510 ON livre');
        $this->addSql('ALTER TABLE livre CHANGE chronologie_id chronologie INT DEFAULT NULL');
        $this->addSql('ALTER TABLE musique DROP FOREIGN KEY FK_EE1D56BCDCCF6510');
        $this->addSql('DROP INDEX IDX_EE1D56BCDCCF6510 ON musique');
        $this->addSql('ALTER TABLE musique CHANGE chronologie_id chronologie INT DEFAULT NULL');
        $this->addSql('ALTER TABLE serie DROP FOREIGN KEY FK_AA3A9334DCCF6510');
        $this->addSql('DROP INDEX IDX_AA3A9334DCCF6510 ON serie');
        $this->addSql('ALTER TABLE serie CHANGE chronologie_id chronologie INT DEFAULT NULL');
    }
}
