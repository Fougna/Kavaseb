<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230121085813 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE editeur_original (id INT AUTO_INCREMENT NOT NULL, personnalite_id INT DEFAULT NULL, profession VARCHAR(255) NOT NULL, importance INT NOT NULL, INDEX IDX_15A4CC782E282BF5 (personnalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editeur_original_livre (editeur_original_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_352BC6BA8A57037E (editeur_original_id), INDEX IDX_352BC6BA37D925CB (livre_id), PRIMARY KEY(editeur_original_id, livre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE editeur_original ADD CONSTRAINT FK_15A4CC782E282BF5 FOREIGN KEY (personnalite_id) REFERENCES personnalite (id)');
        $this->addSql('ALTER TABLE editeur_original_livre ADD CONSTRAINT FK_352BC6BA8A57037E FOREIGN KEY (editeur_original_id) REFERENCES editeur_original (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE editeur_original_livre ADD CONSTRAINT FK_352BC6BA37D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE editeur_original DROP FOREIGN KEY FK_15A4CC782E282BF5');
        $this->addSql('ALTER TABLE editeur_original_livre DROP FOREIGN KEY FK_352BC6BA8A57037E');
        $this->addSql('ALTER TABLE editeur_original_livre DROP FOREIGN KEY FK_352BC6BA37D925CB');
        $this->addSql('DROP TABLE editeur_original');
        $this->addSql('DROP TABLE editeur_original_livre');
    }
}
