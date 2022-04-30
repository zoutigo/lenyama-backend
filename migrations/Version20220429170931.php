<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429170931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Created relation purchase_order menu';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE purchase_order_menus (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', menu_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', purchase_order_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', pom_quantity INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX IDX_8A5664CBCCD7E912 (menu_id), INDEX IDX_8A5664CBA45D7E6A (purchase_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE purchase_order_menus ADD CONSTRAINT FK_8A5664CBCCD7E912 FOREIGN KEY (menu_id) REFERENCES menus (id)');
        $this->addSql('ALTER TABLE purchase_order_menus ADD CONSTRAINT FK_8A5664CBA45D7E6A FOREIGN KEY (purchase_order_id) REFERENCES purchase_orders (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE purchase_order_menus');
    }
}
