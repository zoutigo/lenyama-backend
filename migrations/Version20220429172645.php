<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429172645 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Created restaurant address relation';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurants ADD address_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE restaurants ADD CONSTRAINT FK_AD837724F5B7AF75 FOREIGN KEY (address_id) REFERENCES addresses (id)');
        $this->addSql('CREATE INDEX IDX_AD837724F5B7AF75 ON restaurants (address_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurants DROP FOREIGN KEY FK_AD837724F5B7AF75');
        $this->addSql('DROP INDEX IDX_AD837724F5B7AF75 ON restaurants');
        $this->addSql('ALTER TABLE restaurants DROP address_id');
    }
}
