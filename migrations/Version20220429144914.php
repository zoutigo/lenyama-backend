<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429144914 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Created users restaurants relations';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
       
        $this->addSql('CREATE TABLE restaurant_user (restaurant_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', user_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_4F85462DB1E7706E (restaurant_id), INDEX IDX_4F85462DA76ED395 (user_id), PRIMARY KEY(restaurant_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_restaurant (user_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', restaurant_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_4CF2D4D3A76ED395 (user_id), INDEX IDX_4CF2D4D3B1E7706E (restaurant_id), PRIMARY KEY(user_id, restaurant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE restaurant_user ADD CONSTRAINT FK_4F85462DB1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurants (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE restaurant_user ADD CONSTRAINT FK_4F85462DA76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_restaurant ADD CONSTRAINT FK_4CF2D4D3A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_restaurant ADD CONSTRAINT FK_4CF2D4D3B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurants (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
  
        $this->addSql('DROP TABLE restaurant_user');
        $this->addSql('DROP TABLE user_restaurant');
    }
}
