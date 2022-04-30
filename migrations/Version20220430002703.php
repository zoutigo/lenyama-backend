<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220430002703 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Created relation between users and purchase_orders';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE purchase_orders ADD user_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE purchase_orders ADD CONSTRAINT FK_3E40FFBBA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_3E40FFBBA76ED395 ON purchase_orders (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE purchase_orders DROP FOREIGN KEY FK_3E40FFBBA76ED395');
        $this->addSql('DROP INDEX IDX_3E40FFBBA76ED395 ON purchase_orders');
        $this->addSql('ALTER TABLE purchase_orders DROP user_id');
    }
}
