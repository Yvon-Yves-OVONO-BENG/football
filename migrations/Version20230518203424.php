<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230518203424 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, country VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, surname VARCHAR(255) DEFAULT NULL, INDEX IDX_98197A65296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sell_buy (id INT AUTO_INCREMENT NOT NULL, from_team_id INT DEFAULT NULL, to_team_id INT DEFAULT NULL, amount DOUBLE PRECISION DEFAULT NULL, date_at DATETIME DEFAULT NULL, INDEX IDX_1E2B3BA4AF323B01 (from_team_id), INDEX IDX_1E2B3BA4A7F4E55B (to_team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, money_balance DOUBLE PRECISION DEFAULT NULL, INDEX IDX_C4E0A61FF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE sell_buy ADD CONSTRAINT FK_1E2B3BA4AF323B01 FOREIGN KEY (from_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE sell_buy ADD CONSTRAINT FK_1E2B3BA4A7F4E55B FOREIGN KEY (to_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61FF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65296CD8AE');
        $this->addSql('ALTER TABLE sell_buy DROP FOREIGN KEY FK_1E2B3BA4AF323B01');
        $this->addSql('ALTER TABLE sell_buy DROP FOREIGN KEY FK_1E2B3BA4A7F4E55B');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61FF92F3E70');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE sell_buy');
        $this->addSql('DROP TABLE team');
    }
}
