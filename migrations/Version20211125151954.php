<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211125151954 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE books (id INT NOT NULL, isbn VARCHAR(255) DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, publication_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT NOT NULL, body VARCHAR(255) DEFAULT NULL, author VARCHAR(255) NOT NULL, publication_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE table 2');
        $this->addSql('DROP TABLE villes_france_free');
        $this->addSql('ALTER TABLE activitys CHANGE id id INT NOT NULL, CHANGE prices prices VARCHAR(255) DEFAULT NULL, CHANGE iduser_id iduser_id INT NOT NULL, CHANGE publish publish INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE table 2 (COL 1 VARCHAR(10) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, COL 2 VARCHAR(42) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, COL 3 VARCHAR(5768) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, COL 4 VARCHAR(183) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, COL 5 VARCHAR(6) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, COL 6 VARCHAR(4) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, COL 7 VARCHAR(7) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, COL 8 VARCHAR(25) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, COL 9 VARCHAR(275) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, COL 10 VARCHAR(12) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, COL 11 VARCHAR(12) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, COL 12 VARCHAR(8) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, COL 13 VARCHAR(9) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, COL 14 VARCHAR(7) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, COL 15 VARCHAR(4) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE villes_france_free (ville_id INT UNSIGNED AUTO_INCREMENT NOT NULL, ville_departement VARCHAR(3) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_slug VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_nom VARCHAR(45) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_nom_simple VARCHAR(45) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_nom_reel VARCHAR(45) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_nom_soundex VARCHAR(20) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_nom_metaphone VARCHAR(22) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_code_postal VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_commune VARCHAR(3) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_code_commune VARCHAR(5) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, ville_arrondissement SMALLINT UNSIGNED DEFAULT NULL, ville_canton VARCHAR(4) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_amdi SMALLINT UNSIGNED DEFAULT NULL, ville_population_2010 INT UNSIGNED DEFAULT NULL, ville_population_1999 INT UNSIGNED DEFAULT NULL, ville_population_2012 INT UNSIGNED DEFAULT NULL COMMENT \'approximatif\', ville_densite_2010 INT DEFAULT NULL, ville_surface DOUBLE PRECISION DEFAULT NULL, ville_longitude_deg DOUBLE PRECISION DEFAULT NULL, ville_latitude_deg DOUBLE PRECISION DEFAULT NULL, ville_longitude_grd VARCHAR(9) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_latitude_grd VARCHAR(8) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_longitude_dms VARCHAR(9) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_latitude_dms VARCHAR(8) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_zmin INT DEFAULT NULL, ville_zmax INT DEFAULT NULL, INDEX ville_nom_soundex (ville_nom_soundex), INDEX ville_longitude_latitude_deg (ville_longitude_deg, ville_latitude_deg), INDEX ville_code_commune (ville_code_commune), INDEX ville_nom (ville_nom), UNIQUE INDEX ville_slug (ville_slug), INDEX ville_nom_simple (ville_nom_simple), INDEX ville_nom_metaphone (ville_nom_metaphone), INDEX ville_code_postal (ville_code_postal), INDEX ville_nom_reel (ville_nom_reel), INDEX ville_departement (ville_departement), UNIQUE INDEX ville_code_commune_2 (ville_code_commune), INDEX ville_population_2010 (ville_population_2010), PRIMARY KEY(ville_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('DROP TABLE books');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE review');
        $this->addSql('ALTER TABLE activitys CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE prices prices VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'0\' COLLATE `utf8mb4_unicode_ci`, CHANGE iduser_id iduser_id VARCHAR(11) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE publish publish VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
