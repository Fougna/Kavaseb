<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230129155000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE profession (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, importance INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profession_personnalite (profession_id INT NOT NULL, personnalite_id INT NOT NULL, INDEX IDX_D5AECC49FDEF8996 (profession_id), INDEX IDX_D5AECC492E282BF5 (personnalite_id), PRIMARY KEY(profession_id, personnalite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profession_film (profession_id INT NOT NULL, film_id INT NOT NULL, INDEX IDX_58564343FDEF8996 (profession_id), INDEX IDX_58564343567F5183 (film_id), PRIMARY KEY(profession_id, film_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profession_jeu (profession_id INT NOT NULL, jeu_id INT NOT NULL, INDEX IDX_F0A13CDEFDEF8996 (profession_id), INDEX IDX_F0A13CDE8C9E392E (jeu_id), PRIMARY KEY(profession_id, jeu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profession_livre (profession_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_960C0CAAFDEF8996 (profession_id), INDEX IDX_960C0CAA37D925CB (livre_id), PRIMARY KEY(profession_id, livre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profession_morceau (profession_id INT NOT NULL, morceau_id INT NOT NULL, INDEX IDX_2D053D7DFDEF8996 (profession_id), INDEX IDX_2D053D7D29E8E5CE (morceau_id), PRIMARY KEY(profession_id, morceau_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profession_musique (profession_id INT NOT NULL, musique_id INT NOT NULL, INDEX IDX_F5A319C9FDEF8996 (profession_id), INDEX IDX_F5A319C925E254A1 (musique_id), PRIMARY KEY(profession_id, musique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profession_episode (profession_id INT NOT NULL, episode_id INT NOT NULL, INDEX IDX_C61453AFFDEF8996 (profession_id), INDEX IDX_C61453AF362B62A0 (episode_id), PRIMARY KEY(profession_id, episode_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profession_serie (profession_id INT NOT NULL, serie_id INT NOT NULL, INDEX IDX_9055D007FDEF8996 (profession_id), INDEX IDX_9055D007D94388BD (serie_id), PRIMARY KEY(profession_id, serie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE profession_personnalite ADD CONSTRAINT FK_D5AECC49FDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profession_personnalite ADD CONSTRAINT FK_D5AECC492E282BF5 FOREIGN KEY (personnalite_id) REFERENCES personnalite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profession_film ADD CONSTRAINT FK_58564343FDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profession_film ADD CONSTRAINT FK_58564343567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profession_jeu ADD CONSTRAINT FK_F0A13CDEFDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profession_jeu ADD CONSTRAINT FK_F0A13CDE8C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profession_livre ADD CONSTRAINT FK_960C0CAAFDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profession_livre ADD CONSTRAINT FK_960C0CAA37D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profession_morceau ADD CONSTRAINT FK_2D053D7DFDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profession_morceau ADD CONSTRAINT FK_2D053D7D29E8E5CE FOREIGN KEY (morceau_id) REFERENCES morceau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profession_musique ADD CONSTRAINT FK_F5A319C9FDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profession_musique ADD CONSTRAINT FK_F5A319C925E254A1 FOREIGN KEY (musique_id) REFERENCES musique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profession_episode ADD CONSTRAINT FK_C61453AFFDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profession_episode ADD CONSTRAINT FK_C61453AF362B62A0 FOREIGN KEY (episode_id) REFERENCES episode (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profession_serie ADD CONSTRAINT FK_9055D007FDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profession_serie ADD CONSTRAINT FK_9055D007D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profession_personnalite DROP FOREIGN KEY FK_D5AECC49FDEF8996');
        $this->addSql('ALTER TABLE profession_personnalite DROP FOREIGN KEY FK_D5AECC492E282BF5');
        $this->addSql('ALTER TABLE profession_film DROP FOREIGN KEY FK_58564343FDEF8996');
        $this->addSql('ALTER TABLE profession_film DROP FOREIGN KEY FK_58564343567F5183');
        $this->addSql('ALTER TABLE profession_jeu DROP FOREIGN KEY FK_F0A13CDEFDEF8996');
        $this->addSql('ALTER TABLE profession_jeu DROP FOREIGN KEY FK_F0A13CDE8C9E392E');
        $this->addSql('ALTER TABLE profession_livre DROP FOREIGN KEY FK_960C0CAAFDEF8996');
        $this->addSql('ALTER TABLE profession_livre DROP FOREIGN KEY FK_960C0CAA37D925CB');
        $this->addSql('ALTER TABLE profession_morceau DROP FOREIGN KEY FK_2D053D7DFDEF8996');
        $this->addSql('ALTER TABLE profession_morceau DROP FOREIGN KEY FK_2D053D7D29E8E5CE');
        $this->addSql('ALTER TABLE profession_musique DROP FOREIGN KEY FK_F5A319C9FDEF8996');
        $this->addSql('ALTER TABLE profession_musique DROP FOREIGN KEY FK_F5A319C925E254A1');
        $this->addSql('ALTER TABLE profession_episode DROP FOREIGN KEY FK_C61453AFFDEF8996');
        $this->addSql('ALTER TABLE profession_episode DROP FOREIGN KEY FK_C61453AF362B62A0');
        $this->addSql('ALTER TABLE profession_serie DROP FOREIGN KEY FK_9055D007FDEF8996');
        $this->addSql('ALTER TABLE profession_serie DROP FOREIGN KEY FK_9055D007D94388BD');
        $this->addSql('DROP TABLE profession');
        $this->addSql('DROP TABLE profession_personnalite');
        $this->addSql('DROP TABLE profession_film');
        $this->addSql('DROP TABLE profession_jeu');
        $this->addSql('DROP TABLE profession_livre');
        $this->addSql('DROP TABLE profession_morceau');
        $this->addSql('DROP TABLE profession_musique');
        $this->addSql('DROP TABLE profession_episode');
        $this->addSql('DROP TABLE profession_serie');
    }
}
