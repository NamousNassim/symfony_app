<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231109105727 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compteur (id INT AUTO_INCREMENT NOT NULL, numcom INT NOT NULL, numl VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, base0 VARCHAR(255) NOT NULL, base1 VARCHAR(255) NOT NULL, tva1 VARCHAR(255) NOT NULL, base2 VARCHAR(255) NOT NULL, tva2 VARCHAR(255) NOT NULL, base3 VARCHAR(255) NOT NULL, tva3 VARCHAR(255) NOT NULL, totht VARCHAR(255) NOT NULL, totrem VARCHAR(255) NOT NULL, tottva VARCHAR(255) NOT NULL, timbre VARCHAR(255) NOT NULL, tottc VARCHAR(255) NOT NULL, rs VARCHAR(255) NOT NULL, montrs VARCHAR(255) NOT NULL, net VARCHAR(255) NOT NULL, INDEX IDX_FE86641019EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lcommande (id INT AUTO_INCREMENT NOT NULL, prod_cpmm_id INT DEFAULT NULL, numc VARCHAR(255) NOT NULL, pv VARCHAR(255) NOT NULL, qte VARCHAR(255) NOT NULL, tva VARCHAR(255) NOT NULL, lig VARCHAR(255) NOT NULL, INDEX IDX_57961F0AD426192F (prod_cpmm_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE86641019EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE lcommande ADD CONSTRAINT FK_57961F0AD426192F FOREIGN KEY (prod_cpmm_id) REFERENCES produit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE86641019EB6921');
        $this->addSql('ALTER TABLE lcommande DROP FOREIGN KEY FK_57961F0AD426192F');
        $this->addSql('DROP TABLE compteur');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE lcommande');
    }
}
