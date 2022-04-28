<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220428195010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment ADD horder_id INT DEFAULT NULL, ADD menu_id INT DEFAULT NULL, ADD restaurant_id INT DEFAULT NULL, ADD item_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CE90F8543 FOREIGN KEY (horder_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CB1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('CREATE INDEX IDX_9474526CE90F8543 ON comment (horder_id)');
        $this->addSql('CREATE INDEX IDX_9474526CCCD7E912 ON comment (menu_id)');
        $this->addSql('CREATE INDEX IDX_9474526CB1E7706E ON comment (restaurant_id)');
        $this->addSql('CREATE INDEX IDX_9474526C126F525E ON comment (item_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CE90F8543');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CCCD7E912');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CB1E7706E');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C126F525E');
        $this->addSql('DROP INDEX IDX_9474526CE90F8543 ON comment');
        $this->addSql('DROP INDEX IDX_9474526CCCD7E912 ON comment');
        $this->addSql('DROP INDEX IDX_9474526CB1E7706E ON comment');
        $this->addSql('DROP INDEX IDX_9474526C126F525E ON comment');
        $this->addSql('ALTER TABLE comment DROP horder_id, DROP menu_id, DROP restaurant_id, DROP item_id');
    }
}
