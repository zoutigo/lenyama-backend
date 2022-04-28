<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220428200033 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image ADD restaurant_id INT DEFAULT NULL, ADD menu_id INT DEFAULT NULL, ADD item_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FB1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('CREATE INDEX IDX_C53D045FB1E7706E ON image (restaurant_id)');
        $this->addSql('CREATE INDEX IDX_C53D045FCCD7E912 ON image (menu_id)');
        $this->addSql('CREATE INDEX IDX_C53D045F126F525E ON image (item_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FB1E7706E');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FCCD7E912');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F126F525E');
        $this->addSql('DROP INDEX IDX_C53D045FB1E7706E ON image');
        $this->addSql('DROP INDEX IDX_C53D045FCCD7E912 ON image');
        $this->addSql('DROP INDEX IDX_C53D045F126F525E ON image');
        $this->addSql('ALTER TABLE image DROP restaurant_id, DROP menu_id, DROP item_id');
    }
}
