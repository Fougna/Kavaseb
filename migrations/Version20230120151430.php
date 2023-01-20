<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230120151430 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acteur (id INT AUTO_INCREMENT NOT NULL, personnalite_id INT DEFAULT NULL, profession VARCHAR(255) NOT NULL, importance INT NOT NULL, INDEX IDX_EAFAD3622E282BF5 (personnalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acteur_film (acteur_id INT NOT NULL, film_id INT NOT NULL, INDEX IDX_14B01103DA6F574A (acteur_id), INDEX IDX_14B01103567F5183 (film_id), PRIMARY KEY(acteur_id, film_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acteur_serie (acteur_id INT NOT NULL, serie_id INT NOT NULL, INDEX IDX_E6C577C5DA6F574A (acteur_id), INDEX IDX_E6C577C5D94388BD (serie_id), PRIMARY KEY(acteur_id, serie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acteur_episode (acteur_id INT NOT NULL, episode_id INT NOT NULL, INDEX IDX_776AA6B8DA6F574A (acteur_id), INDEX IDX_776AA6B8362B62A0 (episode_id), PRIMARY KEY(acteur_id, episode_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acteur_jeu (acteur_id INT NOT NULL, jeu_id INT NOT NULL, INDEX IDX_7FE322FFDA6F574A (acteur_id), INDEX IDX_7FE322FF8C9E392E (jeu_id), PRIMARY KEY(acteur_id, jeu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE auteur (id INT AUTO_INCREMENT NOT NULL, personnalite_id INT DEFAULT NULL, profession VARCHAR(255) NOT NULL, importance INT NOT NULL, INDEX IDX_55AB1402E282BF5 (personnalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE auteur_livre (auteur_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_A6DFA5E060BB6FE6 (auteur_id), INDEX IDX_A6DFA5E037D925CB (livre_id), PRIMARY KEY(auteur_id, livre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doubleur (id INT AUTO_INCREMENT NOT NULL, personnalite_id INT DEFAULT NULL, profession VARCHAR(255) NOT NULL, importance INT NOT NULL, INDEX IDX_27CF29A82E282BF5 (personnalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doubleur_film (doubleur_id INT NOT NULL, film_id INT NOT NULL, INDEX IDX_23A99C2FEB78905 (doubleur_id), INDEX IDX_23A99C2567F5183 (film_id), PRIMARY KEY(doubleur_id, film_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doubleur_serie (doubleur_id INT NOT NULL, serie_id INT NOT NULL, INDEX IDX_AB00F6BFEB78905 (doubleur_id), INDEX IDX_AB00F6BD94388BD (serie_id), PRIMARY KEY(doubleur_id, serie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doubleur_episode (doubleur_id INT NOT NULL, episode_id INT NOT NULL, INDEX IDX_193022A4FEB78905 (doubleur_id), INDEX IDX_193022A4362B62A0 (episode_id), PRIMARY KEY(doubleur_id, episode_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doubleur_jeu (doubleur_id INT NOT NULL, jeu_id INT NOT NULL, INDEX IDX_99A4A620FEB78905 (doubleur_id), INDEX IDX_99A4A6208C9E392E (jeu_id), PRIMARY KEY(doubleur_id, jeu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editeur_francais (id INT AUTO_INCREMENT NOT NULL, personnalite_id INT DEFAULT NULL, profession VARCHAR(255) NOT NULL, importance INT NOT NULL, INDEX IDX_CA9817EB2E282BF5 (personnalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editeur_francais_livre (editeur_francais_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_6CD4D90B38A1655B (editeur_francais_id), INDEX IDX_6CD4D90B37D925CB (livre_id), PRIMARY KEY(editeur_francais_id, livre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE episode (id INT AUTO_INCREMENT NOT NULL, saison_id INT DEFAULT NULL, numero INT NOT NULL, titre VARCHAR(255) NOT NULL, INDEX IDX_DDAA1CDAF965414C (saison_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE episode_auteur (episode_id INT NOT NULL, auteur_id INT NOT NULL, INDEX IDX_69672E5B362B62A0 (episode_id), INDEX IDX_69672E5B60BB6FE6 (auteur_id), PRIMARY KEY(episode_id, auteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, titre_francais VARCHAR(255) NOT NULL, sur_titre_francais VARCHAR(255) DEFAULT NULL, sous_titre_francais VARCHAR(255) DEFAULT NULL, titre_original VARCHAR(255) NOT NULL, sur_titre_original VARCHAR(255) DEFAULT NULL, sous_titre_original VARCHAR(255) DEFAULT NULL, image VARCHAR(255) NOT NULL, annee DATE NOT NULL, duree VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, chronologie INT DEFAULT NULL, format VARCHAR(255) NOT NULL, note_film INT DEFAULT NULL, note_image INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, avis LONGTEXT DEFAULT NULL, art VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film_auteur (film_id INT NOT NULL, auteur_id INT NOT NULL, INDEX IDX_6EA88C4A567F5183 (film_id), INDEX IDX_6EA88C4A60BB6FE6 (auteur_id), PRIMARY KEY(film_id, auteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeu (id INT AUTO_INCREMENT NOT NULL, titre_francais VARCHAR(255) NOT NULL, sur_titre_francais VARCHAR(255) DEFAULT NULL, sous_titre_francais VARCHAR(255) DEFAULT NULL, titre_original VARCHAR(255) NOT NULL, sur_titre_original VARCHAR(255) DEFAULT NULL, sous_titre_original VARCHAR(255) DEFAULT NULL, image VARCHAR(255) NOT NULL, annee DATE NOT NULL, genre VARCHAR(255) NOT NULL, chronologie INT DEFAULT NULL, nombre_joueurs_min INT NOT NULL, nombre_joueurs_max INT DEFAULT NULL, note_jeu INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, avis LONGTEXT DEFAULT NULL, art VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeu_auteur (jeu_id INT NOT NULL, auteur_id INT NOT NULL, INDEX IDX_B60E2E6D8C9E392E (jeu_id), INDEX IDX_B60E2E6D60BB6FE6 (auteur_id), PRIMARY KEY(jeu_id, auteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre (id INT AUTO_INCREMENT NOT NULL, titre_francais VARCHAR(255) NOT NULL, sur_titre_francais VARCHAR(255) DEFAULT NULL, sous_titre_francais VARCHAR(255) DEFAULT NULL, titre_original VARCHAR(255) NOT NULL, sur_titre_original VARCHAR(255) DEFAULT NULL, sous_titre_original VARCHAR(255) DEFAULT NULL, image VARCHAR(255) NOT NULL, annee DATE NOT NULL, nombre_de_pages INT NOT NULL, isbn VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, chronologie INT DEFAULT NULL, note_livre INT DEFAULT NULL, note_reliure INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, avis LONGTEXT DEFAULT NULL, art VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnalite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, alias LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', sexe VARCHAR(255) NOT NULL, nationalite VARCHAR(255) DEFAULT NULL, naissance DATE DEFAULT NULL, deces DATE DEFAULT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE preface (id INT AUTO_INCREMENT NOT NULL, personnalite_id INT DEFAULT NULL, profession VARCHAR(255) NOT NULL, importance INT NOT NULL, INDEX IDX_426CFFD92E282BF5 (personnalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE preface_livre (preface_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_DBE0387B33391BCC (preface_id), INDEX IDX_DBE0387B37D925CB (livre_id), PRIMARY KEY(preface_id, livre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producteur (id INT AUTO_INCREMENT NOT NULL, personnalite_id INT DEFAULT NULL, profession VARCHAR(255) NOT NULL, importance INT NOT NULL, INDEX IDX_7EDBEE102E282BF5 (personnalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producteur_film (producteur_id INT NOT NULL, film_id INT NOT NULL, INDEX IDX_B941E119AB9BB300 (producteur_id), INDEX IDX_B941E119567F5183 (film_id), PRIMARY KEY(producteur_id, film_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producteur_serie (producteur_id INT NOT NULL, serie_id INT NOT NULL, INDEX IDX_1B0A7F4FAB9BB300 (producteur_id), INDEX IDX_1B0A7F4FD94388BD (serie_id), PRIMARY KEY(producteur_id, serie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producteur_episode (producteur_id INT NOT NULL, episode_id INT NOT NULL, INDEX IDX_B8DDA384AB9BB300 (producteur_id), INDEX IDX_B8DDA384362B62A0 (episode_id), PRIMARY KEY(producteur_id, episode_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realisateur (id INT AUTO_INCREMENT NOT NULL, personnalite_id INT DEFAULT NULL, profession VARCHAR(255) NOT NULL, importance INT NOT NULL, INDEX IDX_47933EFE2E282BF5 (personnalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realisateur_film (realisateur_id INT NOT NULL, film_id INT NOT NULL, INDEX IDX_78FC70FCF1D8422E (realisateur_id), INDEX IDX_78FC70FC567F5183 (film_id), PRIMARY KEY(realisateur_id, film_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realisateur_serie (realisateur_id INT NOT NULL, serie_id INT NOT NULL, INDEX IDX_CBABD429F1D8422E (realisateur_id), INDEX IDX_CBABD429D94388BD (serie_id), PRIMARY KEY(realisateur_id, serie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realisateur_episode (realisateur_id INT NOT NULL, episode_id INT NOT NULL, INDEX IDX_CA7EC564F1D8422E (realisateur_id), INDEX IDX_CA7EC564362B62A0 (episode_id), PRIMARY KEY(realisateur_id, episode_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, film_id INT DEFAULT NULL, serie_id INT DEFAULT NULL, episode_id INT DEFAULT NULL, jeu_id INT DEFAULT NULL, acteur_id INT DEFAULT NULL, doubleur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_57698A6A567F5183 (film_id), INDEX IDX_57698A6AD94388BD (serie_id), INDEX IDX_57698A6A362B62A0 (episode_id), INDEX IDX_57698A6A8C9E392E (jeu_id), INDEX IDX_57698A6ADA6F574A (acteur_id), INDEX IDX_57698A6AFEB78905 (doubleur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saison (id INT AUTO_INCREMENT NOT NULL, serie_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, annee DATE NOT NULL, numero INT NOT NULL, INDEX IDX_C0D0D586D94388BD (serie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenariste (id INT AUTO_INCREMENT NOT NULL, personnalite_id INT DEFAULT NULL, profession VARCHAR(255) NOT NULL, importance INT NOT NULL, INDEX IDX_FE305A1E2E282BF5 (personnalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenariste_film (scenariste_id INT NOT NULL, film_id INT NOT NULL, INDEX IDX_A5521BF1674CEC6 (scenariste_id), INDEX IDX_A5521BF567F5183 (film_id), PRIMARY KEY(scenariste_id, film_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenariste_serie (scenariste_id INT NOT NULL, serie_id INT NOT NULL, INDEX IDX_240C6D521674CEC6 (scenariste_id), INDEX IDX_240C6D52D94388BD (serie_id), PRIMARY KEY(scenariste_id, serie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenariste_episode (scenariste_id INT NOT NULL, episode_id INT NOT NULL, INDEX IDX_B40881D61674CEC6 (scenariste_id), INDEX IDX_B40881D6362B62A0 (episode_id), PRIMARY KEY(scenariste_id, episode_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenariste_jeu (scenariste_id INT NOT NULL, jeu_id INT NOT NULL, INDEX IDX_9B21F66D1674CEC6 (scenariste_id), INDEX IDX_9B21F66D8C9E392E (jeu_id), PRIMARY KEY(scenariste_id, jeu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie (id INT AUTO_INCREMENT NOT NULL, titre_francais VARCHAR(255) NOT NULL, sur_titre_francais VARCHAR(255) DEFAULT NULL, sous_titre_francais VARCHAR(255) DEFAULT NULL, titre_original VARCHAR(255) NOT NULL, sur_titre_original VARCHAR(255) DEFAULT NULL, sous_ti_tre_original VARCHAR(255) DEFAULT NULL, image VARCHAR(255) NOT NULL, annee_debut DATE NOT NULL, annee_fin DATE DEFAULT NULL, duree VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, chronologie INT DEFAULT NULL, format VARCHAR(255) NOT NULL, note_serie INT DEFAULT NULL, note_image INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, avis LONGTEXT DEFAULT NULL, art VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie_auteur (serie_id INT NOT NULL, auteur_id INT NOT NULL, INDEX IDX_F2F0EA29D94388BD (serie_id), INDEX IDX_F2F0EA2960BB6FE6 (auteur_id), PRIMARY KEY(serie_id, auteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE traducteur (id INT AUTO_INCREMENT NOT NULL, personnalite_id INT DEFAULT NULL, profession VARCHAR(255) NOT NULL, importance INT NOT NULL, INDEX IDX_62BA5C582E282BF5 (personnalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE traducteur_livre (traducteur_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_2F9BAE53954F290 (traducteur_id), INDEX IDX_2F9BAE537D925CB (livre_id), PRIMARY KEY(traducteur_id, livre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acteur ADD CONSTRAINT FK_EAFAD3622E282BF5 FOREIGN KEY (personnalite_id) REFERENCES personnalite (id)');
        $this->addSql('ALTER TABLE acteur_film ADD CONSTRAINT FK_14B01103DA6F574A FOREIGN KEY (acteur_id) REFERENCES acteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acteur_film ADD CONSTRAINT FK_14B01103567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acteur_serie ADD CONSTRAINT FK_E6C577C5DA6F574A FOREIGN KEY (acteur_id) REFERENCES acteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acteur_serie ADD CONSTRAINT FK_E6C577C5D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acteur_episode ADD CONSTRAINT FK_776AA6B8DA6F574A FOREIGN KEY (acteur_id) REFERENCES acteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acteur_episode ADD CONSTRAINT FK_776AA6B8362B62A0 FOREIGN KEY (episode_id) REFERENCES episode (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acteur_jeu ADD CONSTRAINT FK_7FE322FFDA6F574A FOREIGN KEY (acteur_id) REFERENCES acteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acteur_jeu ADD CONSTRAINT FK_7FE322FF8C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE auteur ADD CONSTRAINT FK_55AB1402E282BF5 FOREIGN KEY (personnalite_id) REFERENCES personnalite (id)');
        $this->addSql('ALTER TABLE auteur_livre ADD CONSTRAINT FK_A6DFA5E060BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE auteur_livre ADD CONSTRAINT FK_A6DFA5E037D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doubleur ADD CONSTRAINT FK_27CF29A82E282BF5 FOREIGN KEY (personnalite_id) REFERENCES personnalite (id)');
        $this->addSql('ALTER TABLE doubleur_film ADD CONSTRAINT FK_23A99C2FEB78905 FOREIGN KEY (doubleur_id) REFERENCES doubleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doubleur_film ADD CONSTRAINT FK_23A99C2567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doubleur_serie ADD CONSTRAINT FK_AB00F6BFEB78905 FOREIGN KEY (doubleur_id) REFERENCES doubleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doubleur_serie ADD CONSTRAINT FK_AB00F6BD94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doubleur_episode ADD CONSTRAINT FK_193022A4FEB78905 FOREIGN KEY (doubleur_id) REFERENCES doubleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doubleur_episode ADD CONSTRAINT FK_193022A4362B62A0 FOREIGN KEY (episode_id) REFERENCES episode (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doubleur_jeu ADD CONSTRAINT FK_99A4A620FEB78905 FOREIGN KEY (doubleur_id) REFERENCES doubleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doubleur_jeu ADD CONSTRAINT FK_99A4A6208C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE editeur_francais ADD CONSTRAINT FK_CA9817EB2E282BF5 FOREIGN KEY (personnalite_id) REFERENCES personnalite (id)');
        $this->addSql('ALTER TABLE editeur_francais_livre ADD CONSTRAINT FK_6CD4D90B38A1655B FOREIGN KEY (editeur_francais_id) REFERENCES editeur_francais (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE editeur_francais_livre ADD CONSTRAINT FK_6CD4D90B37D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDAF965414C FOREIGN KEY (saison_id) REFERENCES saison (id)');
        $this->addSql('ALTER TABLE episode_auteur ADD CONSTRAINT FK_69672E5B362B62A0 FOREIGN KEY (episode_id) REFERENCES episode (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE episode_auteur ADD CONSTRAINT FK_69672E5B60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_auteur ADD CONSTRAINT FK_6EA88C4A567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_auteur ADD CONSTRAINT FK_6EA88C4A60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeu_auteur ADD CONSTRAINT FK_B60E2E6D8C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeu_auteur ADD CONSTRAINT FK_B60E2E6D60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preface ADD CONSTRAINT FK_426CFFD92E282BF5 FOREIGN KEY (personnalite_id) REFERENCES personnalite (id)');
        $this->addSql('ALTER TABLE preface_livre ADD CONSTRAINT FK_DBE0387B33391BCC FOREIGN KEY (preface_id) REFERENCES preface (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preface_livre ADD CONSTRAINT FK_DBE0387B37D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE producteur ADD CONSTRAINT FK_7EDBEE102E282BF5 FOREIGN KEY (personnalite_id) REFERENCES personnalite (id)');
        $this->addSql('ALTER TABLE producteur_film ADD CONSTRAINT FK_B941E119AB9BB300 FOREIGN KEY (producteur_id) REFERENCES producteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE producteur_film ADD CONSTRAINT FK_B941E119567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE producteur_serie ADD CONSTRAINT FK_1B0A7F4FAB9BB300 FOREIGN KEY (producteur_id) REFERENCES producteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE producteur_serie ADD CONSTRAINT FK_1B0A7F4FD94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE producteur_episode ADD CONSTRAINT FK_B8DDA384AB9BB300 FOREIGN KEY (producteur_id) REFERENCES producteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE producteur_episode ADD CONSTRAINT FK_B8DDA384362B62A0 FOREIGN KEY (episode_id) REFERENCES episode (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE realisateur ADD CONSTRAINT FK_47933EFE2E282BF5 FOREIGN KEY (personnalite_id) REFERENCES personnalite (id)');
        $this->addSql('ALTER TABLE realisateur_film ADD CONSTRAINT FK_78FC70FCF1D8422E FOREIGN KEY (realisateur_id) REFERENCES realisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE realisateur_film ADD CONSTRAINT FK_78FC70FC567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE realisateur_serie ADD CONSTRAINT FK_CBABD429F1D8422E FOREIGN KEY (realisateur_id) REFERENCES realisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE realisateur_serie ADD CONSTRAINT FK_CBABD429D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE realisateur_episode ADD CONSTRAINT FK_CA7EC564F1D8422E FOREIGN KEY (realisateur_id) REFERENCES realisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE realisateur_episode ADD CONSTRAINT FK_CA7EC564362B62A0 FOREIGN KEY (episode_id) REFERENCES episode (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6A567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6AD94388BD FOREIGN KEY (serie_id) REFERENCES serie (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6A362B62A0 FOREIGN KEY (episode_id) REFERENCES episode (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6A8C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6ADA6F574A FOREIGN KEY (acteur_id) REFERENCES acteur (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6AFEB78905 FOREIGN KEY (doubleur_id) REFERENCES doubleur (id)');
        $this->addSql('ALTER TABLE saison ADD CONSTRAINT FK_C0D0D586D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id)');
        $this->addSql('ALTER TABLE scenariste ADD CONSTRAINT FK_FE305A1E2E282BF5 FOREIGN KEY (personnalite_id) REFERENCES personnalite (id)');
        $this->addSql('ALTER TABLE scenariste_film ADD CONSTRAINT FK_A5521BF1674CEC6 FOREIGN KEY (scenariste_id) REFERENCES scenariste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenariste_film ADD CONSTRAINT FK_A5521BF567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenariste_serie ADD CONSTRAINT FK_240C6D521674CEC6 FOREIGN KEY (scenariste_id) REFERENCES scenariste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenariste_serie ADD CONSTRAINT FK_240C6D52D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenariste_episode ADD CONSTRAINT FK_B40881D61674CEC6 FOREIGN KEY (scenariste_id) REFERENCES scenariste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenariste_episode ADD CONSTRAINT FK_B40881D6362B62A0 FOREIGN KEY (episode_id) REFERENCES episode (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenariste_jeu ADD CONSTRAINT FK_9B21F66D1674CEC6 FOREIGN KEY (scenariste_id) REFERENCES scenariste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenariste_jeu ADD CONSTRAINT FK_9B21F66D8C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serie_auteur ADD CONSTRAINT FK_F2F0EA29D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serie_auteur ADD CONSTRAINT FK_F2F0EA2960BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE traducteur ADD CONSTRAINT FK_62BA5C582E282BF5 FOREIGN KEY (personnalite_id) REFERENCES personnalite (id)');
        $this->addSql('ALTER TABLE traducteur_livre ADD CONSTRAINT FK_2F9BAE53954F290 FOREIGN KEY (traducteur_id) REFERENCES traducteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE traducteur_livre ADD CONSTRAINT FK_2F9BAE537D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acteur DROP FOREIGN KEY FK_EAFAD3622E282BF5');
        $this->addSql('ALTER TABLE acteur_film DROP FOREIGN KEY FK_14B01103DA6F574A');
        $this->addSql('ALTER TABLE acteur_film DROP FOREIGN KEY FK_14B01103567F5183');
        $this->addSql('ALTER TABLE acteur_serie DROP FOREIGN KEY FK_E6C577C5DA6F574A');
        $this->addSql('ALTER TABLE acteur_serie DROP FOREIGN KEY FK_E6C577C5D94388BD');
        $this->addSql('ALTER TABLE acteur_episode DROP FOREIGN KEY FK_776AA6B8DA6F574A');
        $this->addSql('ALTER TABLE acteur_episode DROP FOREIGN KEY FK_776AA6B8362B62A0');
        $this->addSql('ALTER TABLE acteur_jeu DROP FOREIGN KEY FK_7FE322FFDA6F574A');
        $this->addSql('ALTER TABLE acteur_jeu DROP FOREIGN KEY FK_7FE322FF8C9E392E');
        $this->addSql('ALTER TABLE auteur DROP FOREIGN KEY FK_55AB1402E282BF5');
        $this->addSql('ALTER TABLE auteur_livre DROP FOREIGN KEY FK_A6DFA5E060BB6FE6');
        $this->addSql('ALTER TABLE auteur_livre DROP FOREIGN KEY FK_A6DFA5E037D925CB');
        $this->addSql('ALTER TABLE doubleur DROP FOREIGN KEY FK_27CF29A82E282BF5');
        $this->addSql('ALTER TABLE doubleur_film DROP FOREIGN KEY FK_23A99C2FEB78905');
        $this->addSql('ALTER TABLE doubleur_film DROP FOREIGN KEY FK_23A99C2567F5183');
        $this->addSql('ALTER TABLE doubleur_serie DROP FOREIGN KEY FK_AB00F6BFEB78905');
        $this->addSql('ALTER TABLE doubleur_serie DROP FOREIGN KEY FK_AB00F6BD94388BD');
        $this->addSql('ALTER TABLE doubleur_episode DROP FOREIGN KEY FK_193022A4FEB78905');
        $this->addSql('ALTER TABLE doubleur_episode DROP FOREIGN KEY FK_193022A4362B62A0');
        $this->addSql('ALTER TABLE doubleur_jeu DROP FOREIGN KEY FK_99A4A620FEB78905');
        $this->addSql('ALTER TABLE doubleur_jeu DROP FOREIGN KEY FK_99A4A6208C9E392E');
        $this->addSql('ALTER TABLE editeur_francais DROP FOREIGN KEY FK_CA9817EB2E282BF5');
        $this->addSql('ALTER TABLE editeur_francais_livre DROP FOREIGN KEY FK_6CD4D90B38A1655B');
        $this->addSql('ALTER TABLE editeur_francais_livre DROP FOREIGN KEY FK_6CD4D90B37D925CB');
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDAF965414C');
        $this->addSql('ALTER TABLE episode_auteur DROP FOREIGN KEY FK_69672E5B362B62A0');
        $this->addSql('ALTER TABLE episode_auteur DROP FOREIGN KEY FK_69672E5B60BB6FE6');
        $this->addSql('ALTER TABLE film_auteur DROP FOREIGN KEY FK_6EA88C4A567F5183');
        $this->addSql('ALTER TABLE film_auteur DROP FOREIGN KEY FK_6EA88C4A60BB6FE6');
        $this->addSql('ALTER TABLE jeu_auteur DROP FOREIGN KEY FK_B60E2E6D8C9E392E');
        $this->addSql('ALTER TABLE jeu_auteur DROP FOREIGN KEY FK_B60E2E6D60BB6FE6');
        $this->addSql('ALTER TABLE preface DROP FOREIGN KEY FK_426CFFD92E282BF5');
        $this->addSql('ALTER TABLE preface_livre DROP FOREIGN KEY FK_DBE0387B33391BCC');
        $this->addSql('ALTER TABLE preface_livre DROP FOREIGN KEY FK_DBE0387B37D925CB');
        $this->addSql('ALTER TABLE producteur DROP FOREIGN KEY FK_7EDBEE102E282BF5');
        $this->addSql('ALTER TABLE producteur_film DROP FOREIGN KEY FK_B941E119AB9BB300');
        $this->addSql('ALTER TABLE producteur_film DROP FOREIGN KEY FK_B941E119567F5183');
        $this->addSql('ALTER TABLE producteur_serie DROP FOREIGN KEY FK_1B0A7F4FAB9BB300');
        $this->addSql('ALTER TABLE producteur_serie DROP FOREIGN KEY FK_1B0A7F4FD94388BD');
        $this->addSql('ALTER TABLE producteur_episode DROP FOREIGN KEY FK_B8DDA384AB9BB300');
        $this->addSql('ALTER TABLE producteur_episode DROP FOREIGN KEY FK_B8DDA384362B62A0');
        $this->addSql('ALTER TABLE realisateur DROP FOREIGN KEY FK_47933EFE2E282BF5');
        $this->addSql('ALTER TABLE realisateur_film DROP FOREIGN KEY FK_78FC70FCF1D8422E');
        $this->addSql('ALTER TABLE realisateur_film DROP FOREIGN KEY FK_78FC70FC567F5183');
        $this->addSql('ALTER TABLE realisateur_serie DROP FOREIGN KEY FK_CBABD429F1D8422E');
        $this->addSql('ALTER TABLE realisateur_serie DROP FOREIGN KEY FK_CBABD429D94388BD');
        $this->addSql('ALTER TABLE realisateur_episode DROP FOREIGN KEY FK_CA7EC564F1D8422E');
        $this->addSql('ALTER TABLE realisateur_episode DROP FOREIGN KEY FK_CA7EC564362B62A0');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6A567F5183');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6AD94388BD');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6A362B62A0');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6A8C9E392E');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6ADA6F574A');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6AFEB78905');
        $this->addSql('ALTER TABLE saison DROP FOREIGN KEY FK_C0D0D586D94388BD');
        $this->addSql('ALTER TABLE scenariste DROP FOREIGN KEY FK_FE305A1E2E282BF5');
        $this->addSql('ALTER TABLE scenariste_film DROP FOREIGN KEY FK_A5521BF1674CEC6');
        $this->addSql('ALTER TABLE scenariste_film DROP FOREIGN KEY FK_A5521BF567F5183');
        $this->addSql('ALTER TABLE scenariste_serie DROP FOREIGN KEY FK_240C6D521674CEC6');
        $this->addSql('ALTER TABLE scenariste_serie DROP FOREIGN KEY FK_240C6D52D94388BD');
        $this->addSql('ALTER TABLE scenariste_episode DROP FOREIGN KEY FK_B40881D61674CEC6');
        $this->addSql('ALTER TABLE scenariste_episode DROP FOREIGN KEY FK_B40881D6362B62A0');
        $this->addSql('ALTER TABLE scenariste_jeu DROP FOREIGN KEY FK_9B21F66D1674CEC6');
        $this->addSql('ALTER TABLE scenariste_jeu DROP FOREIGN KEY FK_9B21F66D8C9E392E');
        $this->addSql('ALTER TABLE serie_auteur DROP FOREIGN KEY FK_F2F0EA29D94388BD');
        $this->addSql('ALTER TABLE serie_auteur DROP FOREIGN KEY FK_F2F0EA2960BB6FE6');
        $this->addSql('ALTER TABLE traducteur DROP FOREIGN KEY FK_62BA5C582E282BF5');
        $this->addSql('ALTER TABLE traducteur_livre DROP FOREIGN KEY FK_2F9BAE53954F290');
        $this->addSql('ALTER TABLE traducteur_livre DROP FOREIGN KEY FK_2F9BAE537D925CB');
        $this->addSql('DROP TABLE acteur');
        $this->addSql('DROP TABLE acteur_film');
        $this->addSql('DROP TABLE acteur_serie');
        $this->addSql('DROP TABLE acteur_episode');
        $this->addSql('DROP TABLE acteur_jeu');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE auteur_livre');
        $this->addSql('DROP TABLE doubleur');
        $this->addSql('DROP TABLE doubleur_film');
        $this->addSql('DROP TABLE doubleur_serie');
        $this->addSql('DROP TABLE doubleur_episode');
        $this->addSql('DROP TABLE doubleur_jeu');
        $this->addSql('DROP TABLE editeur_francais');
        $this->addSql('DROP TABLE editeur_francais_livre');
        $this->addSql('DROP TABLE episode');
        $this->addSql('DROP TABLE episode_auteur');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE film_auteur');
        $this->addSql('DROP TABLE jeu');
        $this->addSql('DROP TABLE jeu_auteur');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE personnalite');
        $this->addSql('DROP TABLE preface');
        $this->addSql('DROP TABLE preface_livre');
        $this->addSql('DROP TABLE producteur');
        $this->addSql('DROP TABLE producteur_film');
        $this->addSql('DROP TABLE producteur_serie');
        $this->addSql('DROP TABLE producteur_episode');
        $this->addSql('DROP TABLE realisateur');
        $this->addSql('DROP TABLE realisateur_film');
        $this->addSql('DROP TABLE realisateur_serie');
        $this->addSql('DROP TABLE realisateur_episode');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE saison');
        $this->addSql('DROP TABLE scenariste');
        $this->addSql('DROP TABLE scenariste_film');
        $this->addSql('DROP TABLE scenariste_serie');
        $this->addSql('DROP TABLE scenariste_episode');
        $this->addSql('DROP TABLE scenariste_jeu');
        $this->addSql('DROP TABLE serie');
        $this->addSql('DROP TABLE serie_auteur');
        $this->addSql('DROP TABLE traducteur');
        $this->addSql('DROP TABLE traducteur_livre');
    }
}
