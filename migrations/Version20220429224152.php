<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429224152 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Created relation images and restaurants, menus, items, food_categories';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images ADD restaurant_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', ADD menu_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', ADD item_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', ADD food_category_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6AB1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurants (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6ACCD7E912 FOREIGN KEY (menu_id) REFERENCES menus (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A126F525E FOREIGN KEY (item_id) REFERENCES items (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6AB3F04B2C FOREIGN KEY (food_category_id) REFERENCES food_categories (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6AB1E7706E ON images (restaurant_id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6ACCD7E912 ON images (menu_id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6A126F525E ON images (item_id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6AB3F04B2C ON images (food_category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6AB1E7706E');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6ACCD7E912');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A126F525E');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6AB3F04B2C');
        $this->addSql('DROP INDEX IDX_E01FBE6AB1E7706E ON images');
        $this->addSql('DROP INDEX IDX_E01FBE6ACCD7E912 ON images');
        $this->addSql('DROP INDEX IDX_E01FBE6A126F525E ON images');
        $this->addSql('DROP INDEX IDX_E01FBE6AB3F04B2C ON images');
        $this->addSql('ALTER TABLE images DROP restaurant_id, DROP menu_id, DROP item_id, DROP food_category_id');
    }
}
