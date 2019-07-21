<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190721154017 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE institute (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE platform_rate (id INT AUTO_INCREMENT NOT NULL, platform_id INT NOT NULL, institute_id INT NOT NULL, rate DOUBLE PRECISION NOT NULL, date DATETIME NOT NULL, INDEX IDX_5BE45815FFE6496F (platform_id), INDEX IDX_5BE45815697B0F4C (institute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, platform_id INT NOT NULL, institute_id INT NOT NULL, rate DOUBLE PRECISION NOT NULL, author VARCHAR(255) NOT NULL, comment LONGTEXT DEFAULT NULL, date DATETIME NOT NULL, INDEX IDX_794381C6FFE6496F (platform_id), INDEX IDX_794381C6697B0F4C (institute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE platform (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE platform_rate ADD CONSTRAINT FK_5BE45815FFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id)');
        $this->addSql('ALTER TABLE platform_rate ADD CONSTRAINT FK_5BE45815697B0F4C FOREIGN KEY (institute_id) REFERENCES institute (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6FFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6697B0F4C FOREIGN KEY (institute_id) REFERENCES institute (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE platform_rate DROP FOREIGN KEY FK_5BE45815697B0F4C');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6697B0F4C');
        $this->addSql('ALTER TABLE platform_rate DROP FOREIGN KEY FK_5BE45815FFE6496F');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6FFE6496F');
        $this->addSql('DROP TABLE institute');
        $this->addSql('DROP TABLE platform_rate');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE platform');
    }
}
