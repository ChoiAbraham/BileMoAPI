<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200523020743 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, firm VARCHAR(255) NOT NULL, roles JSON DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_C7440455F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provider (id INT AUTO_INCREMENT NOT NULL, company_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, country VARCHAR(100) NOT NULL, telephone VARCHAR(45) DEFAULT NULL, email VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE smartphone (id INT AUTO_INCREMENT NOT NULL, provider_id INT NOT NULL, specification_id INT NOT NULL, title VARCHAR(255) DEFAULT NULL, content LONGTEXT DEFAULT NULL, rate VARCHAR(100) DEFAULT NULL, price INT DEFAULT NULL, INDEX IDX_26B07E2EA53A8AA (provider_id), INDEX IDX_26B07E2E908E2FFE (specification_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specification (id INT AUTO_INCREMENT NOT NULL, system_id INT DEFAULT NULL, battery_id INT DEFAULT NULL, camera_id INT DEFAULT NULL, dimension_id INT DEFAULT NULL, divers_id INT DEFAULT NULL, network_id INT DEFAULT NULL, performance_id INT DEFAULT NULL, screen_id INT DEFAULT NULL, storage_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_E3F1A9AD0952FA5 (system_id), UNIQUE INDEX UNIQ_E3F1A9A19A19CFC (battery_id), UNIQUE INDEX UNIQ_E3F1A9AB47685CD (camera_id), UNIQUE INDEX UNIQ_E3F1A9A277428AD (dimension_id), UNIQUE INDEX UNIQ_E3F1A9A9C3BA491 (divers_id), UNIQUE INDEX UNIQ_E3F1A9A34128B91 (network_id), UNIQUE INDEX UNIQ_E3F1A9AB91ADEEE (performance_id), UNIQUE INDEX UNIQ_E3F1A9A41A67722 (screen_id), UNIQUE INDEX UNIQ_E3F1A9A5CC5DB90 (storage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE battery_entity (id INT AUTO_INCREMENT NOT NULL, capacity VARCHAR(45) NOT NULL, power VARCHAR(45) NOT NULL, technology VARCHAR(45) NOT NULL, without_cable TINYINT(1) NOT NULL, removable TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE camera_entity (id INT AUTO_INCREMENT NOT NULL, camera VARCHAR(255) NOT NULL, flash_front TINYINT(1) NOT NULL, flash_back TINYINT(1) NOT NULL, sensor_number INT NOT NULL, sensor_front_pixels VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dimension_entity (id INT AUTO_INCREMENT NOT NULL, weight VARCHAR(255) NOT NULL, thickness VARCHAR(255) NOT NULL, width VARCHAR(255) NOT NULL, length VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE divers_entity (id INT AUTO_INCREMENT NOT NULL, family VARCHAR(255) DEFAULT NULL, color VARCHAR(255) NOT NULL, appearance VARCHAR(255) NOT NULL, release_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE network_entity (id INT AUTO_INCREMENT NOT NULL, wifi VARCHAR(255) NOT NULL, bluetooth VARCHAR(255) NOT NULL, nfc TINYINT(1) NOT NULL, usb_version VARCHAR(255) NOT NULL, gps TINYINT(1) NOT NULL, gyroscope TINYINT(1) NOT NULL, fingerprint_sensor TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE performance_entity (id INT AUTO_INCREMENT NOT NULL, processor TINYINT(1) NOT NULL, ram VARCHAR(255) NOT NULL, fabriquant VARCHAR(255) NOT NULL, gpu VARCHAR(255) NOT NULL, frequence VARCHAR(255) NOT NULL, cpu VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE screen_entity (id INT AUTO_INCREMENT NOT NULL, size VARCHAR(255) DEFAULT NULL, defintion VARCHAR(255) DEFAULT NULL, dpi VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE storage_entity (id INT AUTO_INCREMENT NOT NULL, memory VARCHAR(255) DEFAULT NULL, extensible VARCHAR(255) DEFAULT NULL, maximum VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE system_entity (id INT AUTO_INCREMENT NOT NULL, operating_system VARCHAR(255) NOT NULL, interface VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) DEFAULT NULL, email VARCHAR(180) NOT NULL, address VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D64919EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE smartphone ADD CONSTRAINT FK_26B07E2EA53A8AA FOREIGN KEY (provider_id) REFERENCES provider (id)');
        $this->addSql('ALTER TABLE smartphone ADD CONSTRAINT FK_26B07E2E908E2FFE FOREIGN KEY (specification_id) REFERENCES specification (id)');
        $this->addSql('ALTER TABLE specification ADD CONSTRAINT FK_E3F1A9AD0952FA5 FOREIGN KEY (system_id) REFERENCES system_entity (id)');
        $this->addSql('ALTER TABLE specification ADD CONSTRAINT FK_E3F1A9A19A19CFC FOREIGN KEY (battery_id) REFERENCES battery_entity (id)');
        $this->addSql('ALTER TABLE specification ADD CONSTRAINT FK_E3F1A9AB47685CD FOREIGN KEY (camera_id) REFERENCES camera_entity (id)');
        $this->addSql('ALTER TABLE specification ADD CONSTRAINT FK_E3F1A9A277428AD FOREIGN KEY (dimension_id) REFERENCES dimension_entity (id)');
        $this->addSql('ALTER TABLE specification ADD CONSTRAINT FK_E3F1A9A9C3BA491 FOREIGN KEY (divers_id) REFERENCES divers_entity (id)');
        $this->addSql('ALTER TABLE specification ADD CONSTRAINT FK_E3F1A9A34128B91 FOREIGN KEY (network_id) REFERENCES network_entity (id)');
        $this->addSql('ALTER TABLE specification ADD CONSTRAINT FK_E3F1A9AB91ADEEE FOREIGN KEY (performance_id) REFERENCES performance_entity (id)');
        $this->addSql('ALTER TABLE specification ADD CONSTRAINT FK_E3F1A9A41A67722 FOREIGN KEY (screen_id) REFERENCES screen_entity (id)');
        $this->addSql('ALTER TABLE specification ADD CONSTRAINT FK_E3F1A9A5CC5DB90 FOREIGN KEY (storage_id) REFERENCES storage_entity (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64919EB6921');
        $this->addSql('ALTER TABLE smartphone DROP FOREIGN KEY FK_26B07E2EA53A8AA');
        $this->addSql('ALTER TABLE smartphone DROP FOREIGN KEY FK_26B07E2E908E2FFE');
        $this->addSql('ALTER TABLE specification DROP FOREIGN KEY FK_E3F1A9A19A19CFC');
        $this->addSql('ALTER TABLE specification DROP FOREIGN KEY FK_E3F1A9AB47685CD');
        $this->addSql('ALTER TABLE specification DROP FOREIGN KEY FK_E3F1A9A277428AD');
        $this->addSql('ALTER TABLE specification DROP FOREIGN KEY FK_E3F1A9A9C3BA491');
        $this->addSql('ALTER TABLE specification DROP FOREIGN KEY FK_E3F1A9A34128B91');
        $this->addSql('ALTER TABLE specification DROP FOREIGN KEY FK_E3F1A9AB91ADEEE');
        $this->addSql('ALTER TABLE specification DROP FOREIGN KEY FK_E3F1A9A41A67722');
        $this->addSql('ALTER TABLE specification DROP FOREIGN KEY FK_E3F1A9A5CC5DB90');
        $this->addSql('ALTER TABLE specification DROP FOREIGN KEY FK_E3F1A9AD0952FA5');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE provider');
        $this->addSql('DROP TABLE smartphone');
        $this->addSql('DROP TABLE specification');
        $this->addSql('DROP TABLE battery_entity');
        $this->addSql('DROP TABLE camera_entity');
        $this->addSql('DROP TABLE dimension_entity');
        $this->addSql('DROP TABLE divers_entity');
        $this->addSql('DROP TABLE network_entity');
        $this->addSql('DROP TABLE performance_entity');
        $this->addSql('DROP TABLE screen_entity');
        $this->addSql('DROP TABLE storage_entity');
        $this->addSql('DROP TABLE system_entity');
        $this->addSql('DROP TABLE user');
    }
}
