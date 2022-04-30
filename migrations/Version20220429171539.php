<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429171539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Created relation cities kwattas';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kwattas ADD city_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE kwattas ADD CONSTRAINT FK_A4E729C28BAC62AF FOREIGN KEY (city_id) REFERENCES cities (id)');
        $this->addSql('CREATE INDEX IDX_A4E729C28BAC62AF ON kwattas (city_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kwattas DROP FOREIGN KEY FK_A4E729C28BAC62AF');
        $this->addSql('DROP INDEX IDX_A4E729C28BAC62AF ON kwattas');
        $this->addSql('ALTER TABLE kwattas DROP city_id');
    }
}
