<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200807141419 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bar_category_bar');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bar_category_bar (bar_category_id INT NOT NULL, bar_id INT NOT NULL, INDEX IDX_A48C0F89C13FB976 (bar_category_id), INDEX IDX_A48C0F8989A253A (bar_id), PRIMARY KEY(bar_category_id, bar_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE bar_category_bar ADD CONSTRAINT FK_A48C0F8989A253A FOREIGN KEY (bar_id) REFERENCES bar (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bar_category_bar ADD CONSTRAINT FK_A48C0F89C13FB976 FOREIGN KEY (bar_category_id) REFERENCES bar_category (id) ON DELETE CASCADE');
    }
}
