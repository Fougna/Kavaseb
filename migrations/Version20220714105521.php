<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220714105521 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE livre (id INT AUTO_INCREMENT NOT NULL, annee_id INT DEFAULT NULL, editeur_francais_id INT DEFAULT NULL, editeur_original_id INT DEFAULT NULL, titre_francais VARCHAR(255) NOT NULL, sur_titre_francais VARCHAR(255) DEFAULT NULL, sous_titre_francais VARCHAR(255) DEFAULT NULL, titre_original VARCHAR(255) NOT NULL, sur_titre_original VARCHAR(255) DEFAULT NULL, sous_titre_original VARCHAR(255) DEFAULT NULL, image VARCHAR(255) NOT NULL, nombre_de_pages DOUBLE PRECISION NOT NULL, isbn VARCHAR(255) NOT NULL, note_livre INT DEFAULT NULL, note_reliure INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, avis LONGTEXT DEFAULT NULL, art VARCHAR(255) DEFAULT NULL, INDEX IDX_AC634F99543EC5F0 (annee_id), INDEX IDX_AC634F9938A1655B (editeur_francais_id), INDEX IDX_AC634F998A57037E (editeur_original_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre_personnalite_profession (livre_id INT NOT NULL, personnalite_profession_id INT NOT NULL, INDEX IDX_6F53FCB337D925CB (livre_id), INDEX IDX_6F53FCB3A1D29AEF (personnalite_profession_id), PRIMARY KEY(livre_id, personnalite_profession_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre_annee (id INT AUTO_INCREMENT NOT NULL, annee DOUBLE PRECISION NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre_editeur_francais (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre_editeur_original (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre_genre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre_genre_livre (livre_genre_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_C35E798D2E5D35B6 (livre_genre_id), INDEX IDX_C35E798D37D925CB (livre_id), PRIMARY KEY(livre_genre_id, livre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99543EC5F0 FOREIGN KEY (annee_id) REFERENCES livre_annee (id)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F9938A1655B FOREIGN KEY (editeur_francais_id) REFERENCES livre_editeur_francais (id)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F998A57037E FOREIGN KEY (editeur_original_id) REFERENCES livre_editeur_original (id)');
        $this->addSql('ALTER TABLE livre_personnalite_profession ADD CONSTRAINT FK_6F53FCB337D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livre_personnalite_profession ADD CONSTRAINT FK_6F53FCB3A1D29AEF FOREIGN KEY (personnalite_profession_id) REFERENCES personnalite_profession (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livre_genre_livre ADD CONSTRAINT FK_C35E798D2E5D35B6 FOREIGN KEY (livre_genre_id) REFERENCES livre_genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livre_genre_livre ADD CONSTRAINT FK_C35E798D37D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livre_personnalite_profession DROP FOREIGN KEY FK_6F53FCB337D925CB');
        $this->addSql('ALTER TABLE livre_genre_livre DROP FOREIGN KEY FK_C35E798D37D925CB');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F99543EC5F0');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F9938A1655B');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F998A57037E');
        $this->addSql('ALTER TABLE livre_genre_livre DROP FOREIGN KEY FK_C35E798D2E5D35B6');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE livre_personnalite_profession');
        $this->addSql('DROP TABLE livre_annee');
        $this->addSql('DROP TABLE livre_editeur_francais');
        $this->addSql('DROP TABLE livre_editeur_original');
        $this->addSql('DROP TABLE livre_genre');
        $this->addSql('DROP TABLE livre_genre_livre');
    }
}
