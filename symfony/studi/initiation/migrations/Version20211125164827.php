<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211125164827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE field (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, fr VARCHAR(255) DEFAULT NULL, en VARCHAR(255) DEFAULT NULL, es VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language_field (language_id INT NOT NULL, field_id INT NOT NULL, INDEX IDX_24AD410982F1BAF4 (language_id), INDEX IDX_24AD4109443707B0 (field_id), PRIMARY KEY(language_id, field_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_field (product_id INT NOT NULL, field_id INT NOT NULL, INDEX IDX_FAA93E044584665A (product_id), INDEX IDX_FAA93E04443707B0 (field_id), PRIMARY KEY(product_id, field_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE language_field ADD CONSTRAINT FK_24AD410982F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE language_field ADD CONSTRAINT FK_24AD4109443707B0 FOREIGN KEY (field_id) REFERENCES field (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_field ADD CONSTRAINT FK_FAA93E044584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_field ADD CONSTRAINT FK_FAA93E04443707B0 FOREIGN KEY (field_id) REFERENCES field (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE language_field DROP FOREIGN KEY FK_24AD4109443707B0');
        $this->addSql('ALTER TABLE product_field DROP FOREIGN KEY FK_FAA93E04443707B0');
        $this->addSql('ALTER TABLE language_field DROP FOREIGN KEY FK_24AD410982F1BAF4');
        $this->addSql('ALTER TABLE product_field DROP FOREIGN KEY FK_FAA93E044584665A');
        $this->addSql('DROP TABLE field');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE language_field');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_field');
    }
}
