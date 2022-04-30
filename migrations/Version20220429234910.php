<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429234910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Created relation between addresses and kwattas';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE addresses ADD kwatta_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE addresses ADD CONSTRAINT FK_6FCA751635105193 FOREIGN KEY (kwatta_id) REFERENCES kwattas (id)');
        $this->addSql('CREATE INDEX IDX_6FCA751635105193 ON addresses (kwatta_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE addresses DROP FOREIGN KEY FK_6FCA751635105193');
        $this->addSql('DROP INDEX IDX_6FCA751635105193 ON addresses');
        $this->addSql('ALTER TABLE addresses DROP kwatta_id');
    }
}
