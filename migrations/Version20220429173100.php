<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429173100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Created relation restaurants food_categories';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurants ADD food_category_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE restaurants ADD CONSTRAINT FK_AD837724B3F04B2C FOREIGN KEY (food_category_id) REFERENCES food_categories (id)');
        $this->addSql('CREATE INDEX IDX_AD837724B3F04B2C ON restaurants (food_category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurants DROP FOREIGN KEY FK_AD837724B3F04B2C');
        $this->addSql('DROP INDEX IDX_AD837724B3F04B2C ON restaurants');
        $this->addSql('ALTER TABLE restaurants DROP food_category_id');
    }
}
