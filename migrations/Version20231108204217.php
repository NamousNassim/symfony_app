<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231108204217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, tel INT NOT NULL, ville VARCHAR(255) NOT NULL, portable INT NOT NULL, email VARCHAR(255) NOT NULL, matfisc VARCHAR(255) NOT NULL, cin VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, clilivr_id INT DEFAULT NULL, numl VARCHAR(255) NOT NULL, observation VARCHAR(255) NOT NULL, dateliv DATE NOT NULL, totht VARCHAR(255) NOT NULL, tottva VARCHAR(255) NOT NULL, totttc VARCHAR(255) NOT NULL, INDEX IDX_A60C9F1FE1E0077C (clilivr_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1FE1E0077C FOREIGN KEY (clilivr_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D76F347EFB');
        $this->addSql('DROP TABLE admin');
        $this->addSql('ALTER TABLE commande ADD comcli_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D6DC175EE FOREIGN KEY (comcli_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D6DC175EE ON commande (comcli_id)');
        $this->addSql('ALTER TABLE produit CHANGE image image VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D6DC175EE');
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_880E0D76F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D76F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1FE1E0077C');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP INDEX IDX_6EEAA67D6DC175EE ON commande');
        $this->addSql('ALTER TABLE commande DROP comcli_id');
        $this->addSql('ALTER TABLE produit CHANGE image image VARCHAR(255) DEFAULT NULL');
    }
}
