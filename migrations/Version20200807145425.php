<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200807145425 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dario (id INT AUTO_INCREMENT NOT NULL, taille INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bar ADD dario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bar ADD CONSTRAINT FK_76FF8CAA34CF74F8 FOREIGN KEY (dario_id) REFERENCES dario (id)');
        $this->addSql('CREATE INDEX IDX_76FF8CAA34CF74F8 ON bar (dario_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bar DROP FOREIGN KEY FK_76FF8CAA34CF74F8');
        $this->addSql('DROP TABLE dario');
        $this->addSql('DROP INDEX IDX_76FF8CAA34CF74F8 ON bar');
        $this->addSql('ALTER TABLE bar DROP dario_id');
    }
}
