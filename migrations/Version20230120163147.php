<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230120163147 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compositeur (id INT AUTO_INCREMENT NOT NULL, personnalite_id INT DEFAULT NULL, profession VARCHAR(255) NOT NULL, importance INT NOT NULL, INDEX IDX_A1491CB72E282BF5 (personnalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compositeur_film (compositeur_id INT NOT NULL, film_id INT NOT NULL, INDEX IDX_AF1EC9FD4F27896D (compositeur_id), INDEX IDX_AF1EC9FD567F5183 (film_id), PRIMARY KEY(compositeur_id, film_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compositeur_serie (compositeur_id INT NOT NULL, serie_id INT NOT NULL, INDEX IDX_BC7B06064F27896D (compositeur_id), INDEX IDX_BC7B0606D94388BD (serie_id), PRIMARY KEY(compositeur_id, serie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compositeur_saison (compositeur_id INT NOT NULL, saison_id INT NOT NULL, INDEX IDX_811C5934F27896D (compositeur_id), INDEX IDX_811C593F965414C (saison_id), PRIMARY KEY(compositeur_id, saison_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compositeur_episode (compositeur_id INT NOT NULL, episode_id INT NOT NULL, INDEX IDX_B0BF39214F27896D (compositeur_id), INDEX IDX_B0BF3921362B62A0 (episode_id), PRIMARY KEY(compositeur_id, episode_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compositeur_jeu (compositeur_id INT NOT NULL, jeu_id INT NOT NULL, INDEX IDX_DA7CDF4A4F27896D (compositeur_id), INDEX IDX_DA7CDF4A8C9E392E (jeu_id), PRIMARY KEY(compositeur_id, jeu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compositeur_musique (compositeur_id INT NOT NULL, musique_id INT NOT NULL, INDEX IDX_830873474F27896D (compositeur_id), INDEX IDX_8308734725E254A1 (musique_id), PRIMARY KEY(compositeur_id, musique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compositeur_morceau (compositeur_id INT NOT NULL, morceau_id INT NOT NULL, INDEX IDX_5BAE57F34F27896D (compositeur_id), INDEX IDX_5BAE57F329E8E5CE (morceau_id), PRIMARY KEY(compositeur_id, morceau_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE label (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE label_musique (label_id INT NOT NULL, musique_id INT NOT NULL, INDEX IDX_529CFF9533B92F39 (label_id), INDEX IDX_529CFF9525E254A1 (musique_id), PRIMARY KEY(label_id, musique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE morceau (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, titre_original VARCHAR(255) NOT NULL, titre_francais VARCHAR(255) DEFAULT NULL, numero INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE morceau_musique (morceau_id INT NOT NULL, musique_id INT NOT NULL, INDEX IDX_6C2BC3E629E8E5CE (morceau_id), INDEX IDX_6C2BC3E625E254A1 (musique_id), PRIMARY KEY(morceau_id, musique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musique (id INT AUTO_INCREMENT NOT NULL, titre_original VARCHAR(255) NOT NULL, sur_titre_original VARCHAR(255) DEFAULT NULL, sous_titre_original VARCHAR(255) DEFAULT NULL, titre_francais VARCHAR(255) DEFAULT NULL, sur_titre_francais VARCHAR(255) DEFAULT NULL, sous_titre_francais VARCHAR(255) DEFAULT NULL, image VARCHAR(255) NOT NULL, annee DATE NOT NULL, duree VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, chronologie INT DEFAULT NULL, note_musique INT DEFAULT NULL, art VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE studio_dev (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, importance INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE studio_dev_studio_jeu (studio_dev_id INT NOT NULL, studio_jeu_id INT NOT NULL, INDEX IDX_11806A43410AFC5D (studio_dev_id), INDEX IDX_11806A4369B532C3 (studio_jeu_id), PRIMARY KEY(studio_dev_id, studio_jeu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE studio_dev_jeu (studio_dev_id INT NOT NULL, jeu_id INT NOT NULL, INDEX IDX_FCABC293410AFC5D (studio_dev_id), INDEX IDX_FCABC2938C9E392E (jeu_id), PRIMARY KEY(studio_dev_id, jeu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE studio_edit (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, importance INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE studio_edit_studio_jeu (studio_edit_id INT NOT NULL, studio_jeu_id INT NOT NULL, INDEX IDX_9A7D88C2E0A67A6B (studio_edit_id), INDEX IDX_9A7D88C269B532C3 (studio_jeu_id), PRIMARY KEY(studio_edit_id, studio_jeu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE studio_edit_jeu (studio_edit_id INT NOT NULL, jeu_id INT NOT NULL, INDEX IDX_33B0FB8CE0A67A6B (studio_edit_id), INDEX IDX_33B0FB8C8C9E392E (jeu_id), PRIMARY KEY(studio_edit_id, jeu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE studio_jeu (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, alias LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE systeme (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, annee DATE NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE systeme_jeu (systeme_id INT NOT NULL, jeu_id INT NOT NULL, INDEX IDX_35D2879E346F772E (systeme_id), INDEX IDX_35D2879E8C9E392E (jeu_id), PRIMARY KEY(systeme_id, jeu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compositeur ADD CONSTRAINT FK_A1491CB72E282BF5 FOREIGN KEY (personnalite_id) REFERENCES personnalite (id)');
        $this->addSql('ALTER TABLE compositeur_film ADD CONSTRAINT FK_AF1EC9FD4F27896D FOREIGN KEY (compositeur_id) REFERENCES compositeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compositeur_film ADD CONSTRAINT FK_AF1EC9FD567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compositeur_serie ADD CONSTRAINT FK_BC7B06064F27896D FOREIGN KEY (compositeur_id) REFERENCES compositeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compositeur_serie ADD CONSTRAINT FK_BC7B0606D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compositeur_saison ADD CONSTRAINT FK_811C5934F27896D FOREIGN KEY (compositeur_id) REFERENCES compositeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compositeur_saison ADD CONSTRAINT FK_811C593F965414C FOREIGN KEY (saison_id) REFERENCES saison (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compositeur_episode ADD CONSTRAINT FK_B0BF39214F27896D FOREIGN KEY (compositeur_id) REFERENCES compositeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compositeur_episode ADD CONSTRAINT FK_B0BF3921362B62A0 FOREIGN KEY (episode_id) REFERENCES episode (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compositeur_jeu ADD CONSTRAINT FK_DA7CDF4A4F27896D FOREIGN KEY (compositeur_id) REFERENCES compositeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compositeur_jeu ADD CONSTRAINT FK_DA7CDF4A8C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compositeur_musique ADD CONSTRAINT FK_830873474F27896D FOREIGN KEY (compositeur_id) REFERENCES compositeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compositeur_musique ADD CONSTRAINT FK_8308734725E254A1 FOREIGN KEY (musique_id) REFERENCES musique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compositeur_morceau ADD CONSTRAINT FK_5BAE57F34F27896D FOREIGN KEY (compositeur_id) REFERENCES compositeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compositeur_morceau ADD CONSTRAINT FK_5BAE57F329E8E5CE FOREIGN KEY (morceau_id) REFERENCES morceau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE label_musique ADD CONSTRAINT FK_529CFF9533B92F39 FOREIGN KEY (label_id) REFERENCES label (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE label_musique ADD CONSTRAINT FK_529CFF9525E254A1 FOREIGN KEY (musique_id) REFERENCES musique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE morceau_musique ADD CONSTRAINT FK_6C2BC3E629E8E5CE FOREIGN KEY (morceau_id) REFERENCES morceau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE morceau_musique ADD CONSTRAINT FK_6C2BC3E625E254A1 FOREIGN KEY (musique_id) REFERENCES musique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE studio_dev_studio_jeu ADD CONSTRAINT FK_11806A43410AFC5D FOREIGN KEY (studio_dev_id) REFERENCES studio_dev (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE studio_dev_studio_jeu ADD CONSTRAINT FK_11806A4369B532C3 FOREIGN KEY (studio_jeu_id) REFERENCES studio_jeu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE studio_dev_jeu ADD CONSTRAINT FK_FCABC293410AFC5D FOREIGN KEY (studio_dev_id) REFERENCES studio_dev (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE studio_dev_jeu ADD CONSTRAINT FK_FCABC2938C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE studio_edit_studio_jeu ADD CONSTRAINT FK_9A7D88C2E0A67A6B FOREIGN KEY (studio_edit_id) REFERENCES studio_edit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE studio_edit_studio_jeu ADD CONSTRAINT FK_9A7D88C269B532C3 FOREIGN KEY (studio_jeu_id) REFERENCES studio_jeu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE studio_edit_jeu ADD CONSTRAINT FK_33B0FB8CE0A67A6B FOREIGN KEY (studio_edit_id) REFERENCES studio_edit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE studio_edit_jeu ADD CONSTRAINT FK_33B0FB8C8C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE systeme_jeu ADD CONSTRAINT FK_35D2879E346F772E FOREIGN KEY (systeme_id) REFERENCES systeme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE systeme_jeu ADD CONSTRAINT FK_35D2879E8C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compositeur DROP FOREIGN KEY FK_A1491CB72E282BF5');
        $this->addSql('ALTER TABLE compositeur_film DROP FOREIGN KEY FK_AF1EC9FD4F27896D');
        $this->addSql('ALTER TABLE compositeur_film DROP FOREIGN KEY FK_AF1EC9FD567F5183');
        $this->addSql('ALTER TABLE compositeur_serie DROP FOREIGN KEY FK_BC7B06064F27896D');
        $this->addSql('ALTER TABLE compositeur_serie DROP FOREIGN KEY FK_BC7B0606D94388BD');
        $this->addSql('ALTER TABLE compositeur_saison DROP FOREIGN KEY FK_811C5934F27896D');
        $this->addSql('ALTER TABLE compositeur_saison DROP FOREIGN KEY FK_811C593F965414C');
        $this->addSql('ALTER TABLE compositeur_episode DROP FOREIGN KEY FK_B0BF39214F27896D');
        $this->addSql('ALTER TABLE compositeur_episode DROP FOREIGN KEY FK_B0BF3921362B62A0');
        $this->addSql('ALTER TABLE compositeur_jeu DROP FOREIGN KEY FK_DA7CDF4A4F27896D');
        $this->addSql('ALTER TABLE compositeur_jeu DROP FOREIGN KEY FK_DA7CDF4A8C9E392E');
        $this->addSql('ALTER TABLE compositeur_musique DROP FOREIGN KEY FK_830873474F27896D');
        $this->addSql('ALTER TABLE compositeur_musique DROP FOREIGN KEY FK_8308734725E254A1');
        $this->addSql('ALTER TABLE compositeur_morceau DROP FOREIGN KEY FK_5BAE57F34F27896D');
        $this->addSql('ALTER TABLE compositeur_morceau DROP FOREIGN KEY FK_5BAE57F329E8E5CE');
        $this->addSql('ALTER TABLE label_musique DROP FOREIGN KEY FK_529CFF9533B92F39');
        $this->addSql('ALTER TABLE label_musique DROP FOREIGN KEY FK_529CFF9525E254A1');
        $this->addSql('ALTER TABLE morceau_musique DROP FOREIGN KEY FK_6C2BC3E629E8E5CE');
        $this->addSql('ALTER TABLE morceau_musique DROP FOREIGN KEY FK_6C2BC3E625E254A1');
        $this->addSql('ALTER TABLE studio_dev_studio_jeu DROP FOREIGN KEY FK_11806A43410AFC5D');
        $this->addSql('ALTER TABLE studio_dev_studio_jeu DROP FOREIGN KEY FK_11806A4369B532C3');
        $this->addSql('ALTER TABLE studio_dev_jeu DROP FOREIGN KEY FK_FCABC293410AFC5D');
        $this->addSql('ALTER TABLE studio_dev_jeu DROP FOREIGN KEY FK_FCABC2938C9E392E');
        $this->addSql('ALTER TABLE studio_edit_studio_jeu DROP FOREIGN KEY FK_9A7D88C2E0A67A6B');
        $this->addSql('ALTER TABLE studio_edit_studio_jeu DROP FOREIGN KEY FK_9A7D88C269B532C3');
        $this->addSql('ALTER TABLE studio_edit_jeu DROP FOREIGN KEY FK_33B0FB8CE0A67A6B');
        $this->addSql('ALTER TABLE studio_edit_jeu DROP FOREIGN KEY FK_33B0FB8C8C9E392E');
        $this->addSql('ALTER TABLE systeme_jeu DROP FOREIGN KEY FK_35D2879E346F772E');
        $this->addSql('ALTER TABLE systeme_jeu DROP FOREIGN KEY FK_35D2879E8C9E392E');
        $this->addSql('DROP TABLE compositeur');
        $this->addSql('DROP TABLE compositeur_film');
        $this->addSql('DROP TABLE compositeur_serie');
        $this->addSql('DROP TABLE compositeur_saison');
        $this->addSql('DROP TABLE compositeur_episode');
        $this->addSql('DROP TABLE compositeur_jeu');
        $this->addSql('DROP TABLE compositeur_musique');
        $this->addSql('DROP TABLE compositeur_morceau');
        $this->addSql('DROP TABLE label');
        $this->addSql('DROP TABLE label_musique');
        $this->addSql('DROP TABLE morceau');
        $this->addSql('DROP TABLE morceau_musique');
        $this->addSql('DROP TABLE musique');
        $this->addSql('DROP TABLE studio_dev');
        $this->addSql('DROP TABLE studio_dev_studio_jeu');
        $this->addSql('DROP TABLE studio_dev_jeu');
        $this->addSql('DROP TABLE studio_edit');
        $this->addSql('DROP TABLE studio_edit_studio_jeu');
        $this->addSql('DROP TABLE studio_edit_jeu');
        $this->addSql('DROP TABLE studio_jeu');
        $this->addSql('DROP TABLE systeme');
        $this->addSql('DROP TABLE systeme_jeu');
    }
}
