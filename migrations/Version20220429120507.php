<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429120507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Created purchase_orders table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE purchase_orders (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', pod_status VARCHAR(255) NOT NULL, pod_delivery_date DATETIME NOT NULL, pod_incoterms VARCHAR(255) NOT NULL, pod_net_price DOUBLE PRECISION NOT NULL, pod_taxes_price DOUBLE PRECISION NOT NULL, pod_total_price DOUBLE PRECISION NOT NULL, pod_delivery_price DOUBLE PRECISION NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE purchase_orders');
    }
}
