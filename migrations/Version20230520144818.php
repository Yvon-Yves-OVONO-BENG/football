<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230520144818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sell_buy ADD player_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sell_buy ADD CONSTRAINT FK_1E2B3BA499E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)');
        $this->addSql('CREATE INDEX IDX_1E2B3BA499E6F5DF ON sell_buy (player_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sell_buy DROP FOREIGN KEY FK_1E2B3BA499E6F5DF');
        $this->addSql('DROP INDEX IDX_1E2B3BA499E6F5DF ON sell_buy');
        $this->addSql('ALTER TABLE sell_buy DROP player_id');
    }
}
