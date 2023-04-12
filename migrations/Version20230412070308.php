<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412070308 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pricing_plan (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pricing_plan_pricing_plan_future (pricing_plan_id INT NOT NULL, pricing_plan_future_id INT NOT NULL, INDEX IDX_EEFD1CFF29628C71 (pricing_plan_id), INDEX IDX_EEFD1CFFBA432A49 (pricing_plan_future_id), PRIMARY KEY(pricing_plan_id, pricing_plan_future_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pricing_plan_benefit (id INT AUTO_INCREMENT NOT NULL, pricing_plan_id INT NOT NULL, name VARCHAR(50) NOT NULL, INDEX IDX_E6A62C5F29628C71 (pricing_plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pricing_plan_future (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pricing_plan_pricing_plan_future ADD CONSTRAINT FK_EEFD1CFF29628C71 FOREIGN KEY (pricing_plan_id) REFERENCES pricing_plan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pricing_plan_pricing_plan_future ADD CONSTRAINT FK_EEFD1CFFBA432A49 FOREIGN KEY (pricing_plan_future_id) REFERENCES pricing_plan_future (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pricing_plan_benefit ADD CONSTRAINT FK_E6A62C5F29628C71 FOREIGN KEY (pricing_plan_id) REFERENCES pricing_plan (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pricing_plan_pricing_plan_future DROP FOREIGN KEY FK_EEFD1CFF29628C71');
        $this->addSql('ALTER TABLE pricing_plan_pricing_plan_future DROP FOREIGN KEY FK_EEFD1CFFBA432A49');
        $this->addSql('ALTER TABLE pricing_plan_benefit DROP FOREIGN KEY FK_E6A62C5F29628C71');
        $this->addSql('DROP TABLE pricing_plan');
        $this->addSql('DROP TABLE pricing_plan_pricing_plan_future');
        $this->addSql('DROP TABLE pricing_plan_benefit');
        $this->addSql('DROP TABLE pricing_plan_future');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
