<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429173818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Created relation restaurants purchase_orders';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE purchase_orders ADD restaurant_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE purchase_orders ADD CONSTRAINT FK_3E40FFBBB1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurants (id)');
        $this->addSql('CREATE INDEX IDX_3E40FFBBB1E7706E ON purchase_orders (restaurant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE purchase_orders DROP FOREIGN KEY FK_3E40FFBBB1E7706E');
        $this->addSql('DROP INDEX IDX_3E40FFBBB1E7706E ON purchase_orders');
        $this->addSql('ALTER TABLE purchase_orders DROP restaurant_id');
    }
}
