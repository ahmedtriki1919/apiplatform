<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210416135053 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pet_tag');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1966F7FB6');
        $this->addSql('DROP INDEX IDX_64C19C1966F7FB6 ON category');
        $this->addSql('ALTER TABLE category DROP pet_id');
        $this->addSql('ALTER TABLE pet DROP categories, DROP tags');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pet_tag (pet_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_4AC9A6D6966F7FB6 (pet_id), INDEX IDX_4AC9A6D6BAD26311 (tag_id), PRIMARY KEY(pet_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE pet_tag ADD CONSTRAINT FK_4AC9A6D6966F7FB6 FOREIGN KEY (pet_id) REFERENCES pet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pet_tag ADD CONSTRAINT FK_4AC9A6D6BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category ADD pet_id INT NOT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1966F7FB6 FOREIGN KEY (pet_id) REFERENCES pet (id)');
        $this->addSql('CREATE INDEX IDX_64C19C1966F7FB6 ON category (pet_id)');
        $this->addSql('ALTER TABLE pet ADD categories INT NOT NULL, ADD tags VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
