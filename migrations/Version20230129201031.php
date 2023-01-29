<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230129201031 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE auteur DROP FOREIGN KEY FK_55AB1402E282BF5');
        $this->addSql('ALTER TABLE auteur_livre DROP FOREIGN KEY FK_A6DFA5E060BB6FE6');
        $this->addSql('ALTER TABLE auteur_livre DROP FOREIGN KEY FK_A6DFA5E037D925CB');
        $this->addSql('ALTER TABLE episode_auteur DROP FOREIGN KEY FK_69672E5B362B62A0');
        $this->addSql('ALTER TABLE episode_auteur DROP FOREIGN KEY FK_69672E5B60BB6FE6');
        $this->addSql('ALTER TABLE film_auteur DROP FOREIGN KEY FK_6EA88C4A567F5183');
        $this->addSql('ALTER TABLE film_auteur DROP FOREIGN KEY FK_6EA88C4A60BB6FE6');
        $this->addSql('ALTER TABLE jeu_auteur DROP FOREIGN KEY FK_B60E2E6D60BB6FE6');
        $this->addSql('ALTER TABLE jeu_auteur DROP FOREIGN KEY FK_B60E2E6D8C9E392E');
        $this->addSql('ALTER TABLE role_auteur DROP FOREIGN KEY FK_AE7C50F160BB6FE6');
        $this->addSql('ALTER TABLE role_auteur DROP FOREIGN KEY FK_AE7C50F1D60322AC');
        $this->addSql('ALTER TABLE serie_auteur DROP FOREIGN KEY FK_F2F0EA2960BB6FE6');
        $this->addSql('ALTER TABLE serie_auteur DROP FOREIGN KEY FK_F2F0EA29D94388BD');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE auteur_livre');
        $this->addSql('DROP TABLE episode_auteur');
        $this->addSql('DROP TABLE film_auteur');
        $this->addSql('DROP TABLE jeu_auteur');
        $this->addSql('DROP TABLE role_auteur');
        $this->addSql('DROP TABLE serie_auteur');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auteur (id INT AUTO_INCREMENT NOT NULL, personnalite_id INT DEFAULT NULL, profession VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, importance INT NOT NULL, INDEX IDX_55AB1402E282BF5 (personnalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE auteur_livre (auteur_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_A6DFA5E060BB6FE6 (auteur_id), INDEX IDX_A6DFA5E037D925CB (livre_id), PRIMARY KEY(auteur_id, livre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE episode_auteur (episode_id INT NOT NULL, auteur_id INT NOT NULL, INDEX IDX_69672E5B362B62A0 (episode_id), INDEX IDX_69672E5B60BB6FE6 (auteur_id), PRIMARY KEY(episode_id, auteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE film_auteur (film_id INT NOT NULL, auteur_id INT NOT NULL, INDEX IDX_6EA88C4A567F5183 (film_id), INDEX IDX_6EA88C4A60BB6FE6 (auteur_id), PRIMARY KEY(film_id, auteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE jeu_auteur (jeu_id INT NOT NULL, auteur_id INT NOT NULL, INDEX IDX_B60E2E6D8C9E392E (jeu_id), INDEX IDX_B60E2E6D60BB6FE6 (auteur_id), PRIMARY KEY(jeu_id, auteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE role_auteur (role_id INT NOT NULL, auteur_id INT NOT NULL, INDEX IDX_AE7C50F160BB6FE6 (auteur_id), INDEX IDX_AE7C50F1D60322AC (role_id), PRIMARY KEY(role_id, auteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE serie_auteur (serie_id INT NOT NULL, auteur_id INT NOT NULL, INDEX IDX_F2F0EA2960BB6FE6 (auteur_id), INDEX IDX_F2F0EA29D94388BD (serie_id), PRIMARY KEY(serie_id, auteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE auteur ADD CONSTRAINT FK_55AB1402E282BF5 FOREIGN KEY (personnalite_id) REFERENCES personnalite (id)');
        $this->addSql('ALTER TABLE auteur_livre ADD CONSTRAINT FK_A6DFA5E060BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE auteur_livre ADD CONSTRAINT FK_A6DFA5E037D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE episode_auteur ADD CONSTRAINT FK_69672E5B362B62A0 FOREIGN KEY (episode_id) REFERENCES episode (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE episode_auteur ADD CONSTRAINT FK_69672E5B60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_auteur ADD CONSTRAINT FK_6EA88C4A567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_auteur ADD CONSTRAINT FK_6EA88C4A60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeu_auteur ADD CONSTRAINT FK_B60E2E6D60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeu_auteur ADD CONSTRAINT FK_B60E2E6D8C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE role_auteur ADD CONSTRAINT FK_AE7C50F160BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE role_auteur ADD CONSTRAINT FK_AE7C50F1D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serie_auteur ADD CONSTRAINT FK_F2F0EA2960BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serie_auteur ADD CONSTRAINT FK_F2F0EA29D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
    }
}
