<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220714131140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livre_genre_livre DROP FOREIGN KEY FK_C35E798D37D925CB');
        $this->addSql('ALTER TABLE livre_personnalite_profession DROP FOREIGN KEY FK_6F53FCB337D925CB');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F99543EC5F0');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F9938A1655B');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F998A57037E');
        $this->addSql('ALTER TABLE livre_genre_livre DROP FOREIGN KEY FK_C35E798D2E5D35B6');
        $this->addSql('ALTER TABLE personnalite_profession_personnalite DROP FOREIGN KEY FK_B002D9C02E282BF5');
        $this->addSql('ALTER TABLE livre_personnalite_profession DROP FOREIGN KEY FK_6F53FCB3A1D29AEF');
        $this->addSql('ALTER TABLE personnalite_profession_personnalite DROP FOREIGN KEY FK_B002D9C0A1D29AEF');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE livre_annee');
        $this->addSql('DROP TABLE livre_editeur_francais');
        $this->addSql('DROP TABLE livre_editeur_original');
        $this->addSql('DROP TABLE livre_genre');
        $this->addSql('DROP TABLE livre_genre_livre');
        $this->addSql('DROP TABLE livre_personnalite_profession');
        $this->addSql('DROP TABLE personnalite');
        $this->addSql('DROP TABLE personnalite_profession');
        $this->addSql('DROP TABLE personnalite_profession_personnalite');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE livre (id INT AUTO_INCREMENT NOT NULL, annee_id INT DEFAULT NULL, editeur_francais_id INT DEFAULT NULL, editeur_original_id INT DEFAULT NULL, titre_francais VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, sur_titre_francais VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, sous_titre_francais VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, titre_original VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, sur_titre_original VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, sous_titre_original VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nombre_de_pages DOUBLE PRECISION NOT NULL, isbn VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, note_livre INT DEFAULT NULL, note_reliure INT DEFAULT NULL, description LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, avis LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, art VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_AC634F9938A1655B (editeur_francais_id), INDEX IDX_AC634F99543EC5F0 (annee_id), INDEX IDX_AC634F998A57037E (editeur_original_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE livre_annee (id INT AUTO_INCREMENT NOT NULL, annee DOUBLE PRECISION NOT NULL, image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE livre_editeur_francais (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE livre_editeur_original (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE livre_genre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE livre_genre_livre (livre_genre_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_C35E798D2E5D35B6 (livre_genre_id), INDEX IDX_C35E798D37D925CB (livre_id), PRIMARY KEY(livre_genre_id, livre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE livre_personnalite_profession (livre_id INT NOT NULL, personnalite_profession_id INT NOT NULL, INDEX IDX_6F53FCB337D925CB (livre_id), INDEX IDX_6F53FCB3A1D29AEF (personnalite_profession_id), PRIMARY KEY(livre_id, personnalite_profession_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE personnalite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, alias VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, sexe INT NOT NULL, photo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE personnalite_profession (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, profession_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE personnalite_profession_personnalite (personnalite_profession_id INT NOT NULL, personnalite_id INT NOT NULL, INDEX IDX_B002D9C0A1D29AEF (personnalite_profession_id), INDEX IDX_B002D9C02E282BF5 (personnalite_id), PRIMARY KEY(personnalite_profession_id, personnalite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F9938A1655B FOREIGN KEY (editeur_francais_id) REFERENCES livre_editeur_francais (id)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F998A57037E FOREIGN KEY (editeur_original_id) REFERENCES livre_editeur_original (id)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99543EC5F0 FOREIGN KEY (annee_id) REFERENCES livre_annee (id)');
        $this->addSql('ALTER TABLE livre_genre_livre ADD CONSTRAINT FK_C35E798D2E5D35B6 FOREIGN KEY (livre_genre_id) REFERENCES livre_genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livre_genre_livre ADD CONSTRAINT FK_C35E798D37D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livre_personnalite_profession ADD CONSTRAINT FK_6F53FCB337D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livre_personnalite_profession ADD CONSTRAINT FK_6F53FCB3A1D29AEF FOREIGN KEY (personnalite_profession_id) REFERENCES personnalite_profession (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnalite_profession_personnalite ADD CONSTRAINT FK_B002D9C02E282BF5 FOREIGN KEY (personnalite_id) REFERENCES personnalite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnalite_profession_personnalite ADD CONSTRAINT FK_B002D9C0A1D29AEF FOREIGN KEY (personnalite_profession_id) REFERENCES personnalite_profession (id) ON DELETE CASCADE');
    }
}
