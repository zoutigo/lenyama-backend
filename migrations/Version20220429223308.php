<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429223308 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'created relation between comments and menus, purchase_orders,items, restaurants';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments ADD purchase_order_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', ADD menu_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', ADD restaurant_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', ADD item_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AA45D7E6A FOREIGN KEY (purchase_order_id) REFERENCES purchase_orders (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962ACCD7E912 FOREIGN KEY (menu_id) REFERENCES menus (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AB1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurants (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A126F525E FOREIGN KEY (item_id) REFERENCES items (id)');
        $this->addSql('CREATE INDEX IDX_5F9E962AA45D7E6A ON comments (purchase_order_id)');
        $this->addSql('CREATE INDEX IDX_5F9E962ACCD7E912 ON comments (menu_id)');
        $this->addSql('CREATE INDEX IDX_5F9E962AB1E7706E ON comments (restaurant_id)');
        $this->addSql('CREATE INDEX IDX_5F9E962A126F525E ON comments (item_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AA45D7E6A');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962ACCD7E912');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AB1E7706E');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A126F525E');
        $this->addSql('DROP INDEX IDX_5F9E962AA45D7E6A ON comments');
        $this->addSql('DROP INDEX IDX_5F9E962ACCD7E912 ON comments');
        $this->addSql('DROP INDEX IDX_5F9E962AB1E7706E ON comments');
        $this->addSql('DROP INDEX IDX_5F9E962A126F525E ON comments');
        $this->addSql('ALTER TABLE comments DROP purchase_order_id, DROP menu_id, DROP restaurant_id, DROP item_id');
    }
}
