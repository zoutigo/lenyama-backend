<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220428194255 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE kwatta (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, kwt_name VARCHAR(255) NOT NULL, kwt_description LONGTEXT DEFAULT NULL, INDEX IDX_3987DF338BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE kwatta ADD CONSTRAINT FK_3987DF338BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE address ADD kwatta_id INT NOT NULL');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F8135105193 FOREIGN KEY (kwatta_id) REFERENCES kwatta (id)');
        $this->addSql('CREATE INDEX IDX_D4E6F8135105193 ON address (kwatta_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F8135105193');
        $this->addSql('DROP TABLE kwatta');
        $this->addSql('DROP INDEX IDX_D4E6F8135105193 ON address');
        $this->addSql('ALTER TABLE address DROP kwatta_id');
    }
}
