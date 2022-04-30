<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220430005757 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Created relation restaurants and items';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE items ADD restaurant_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE items ADD CONSTRAINT FK_E11EE94DB1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurants (id)');
        $this->addSql('CREATE INDEX IDX_E11EE94DB1E7706E ON items (restaurant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE items DROP FOREIGN KEY FK_E11EE94DB1E7706E');
        $this->addSql('DROP INDEX IDX_E11EE94DB1E7706E ON items');
        $this->addSql('ALTER TABLE items DROP restaurant_id');
    }
}
