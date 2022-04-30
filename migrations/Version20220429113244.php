<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429113244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Created relation user and note';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notes ADD user_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE notes ADD CONSTRAINT FK_11BA68CA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_11BA68CA76ED395 ON notes (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notes DROP FOREIGN KEY FK_11BA68CA76ED395');
        $this->addSql('DROP INDEX IDX_11BA68CA76ED395 ON notes');
        $this->addSql('ALTER TABLE notes DROP user_id');
    }
}
