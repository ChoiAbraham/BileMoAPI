<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200524144611 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client CHANGE roles roles JSON DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE client_user CHANGE first_name first_name VARCHAR(255) DEFAULT NULL, CHANGE address address VARCHAR(255) DEFAULT NULL, CHANGE country country VARCHAR(255) DEFAULT NULL, CHANGE telephone telephone VARCHAR(255) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE provider CHANGE telephone telephone VARCHAR(45) DEFAULT NULL, CHANGE email email VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE smartphone CHANGE title title VARCHAR(255) DEFAULT NULL, CHANGE rate rate VARCHAR(100) DEFAULT NULL, CHANGE price price INT DEFAULT NULL');
        $this->addSql('ALTER TABLE specification CHANGE system_id system_id INT DEFAULT NULL, CHANGE battery_id battery_id INT DEFAULT NULL, CHANGE camera_id camera_id INT DEFAULT NULL, CHANGE dimension_id dimension_id INT DEFAULT NULL, CHANGE divers_id divers_id INT DEFAULT NULL, CHANGE network_id network_id INT DEFAULT NULL, CHANGE performance_id performance_id INT DEFAULT NULL, CHANGE screen_id screen_id INT DEFAULT NULL, CHANGE storage_id storage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE divers_entity CHANGE family family VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE screen_entity CHANGE size size VARCHAR(255) DEFAULT NULL, CHANGE defintion defintion VARCHAR(255) DEFAULT NULL, CHANGE dpi dpi VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE storage_entity CHANGE memory memory VARCHAR(255) DEFAULT NULL, CHANGE extensible extensible VARCHAR(255) DEFAULT NULL, CHANGE maximum maximum VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE system_entity CHANGE interface interface VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_bin`, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE client_user CHANGE first_name first_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE address address VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE country country VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE created_at created_at DATETIME DEFAULT \'NULL\', CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE divers_entity CHANGE family family VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE provider CHANGE telephone telephone VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE screen_entity CHANGE size size VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE defintion defintion VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE dpi dpi VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE smartphone CHANGE title title VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE rate rate VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE price price INT DEFAULT NULL');
        $this->addSql('ALTER TABLE specification CHANGE system_id system_id INT DEFAULT NULL, CHANGE battery_id battery_id INT DEFAULT NULL, CHANGE camera_id camera_id INT DEFAULT NULL, CHANGE dimension_id dimension_id INT DEFAULT NULL, CHANGE divers_id divers_id INT DEFAULT NULL, CHANGE network_id network_id INT DEFAULT NULL, CHANGE performance_id performance_id INT DEFAULT NULL, CHANGE screen_id screen_id INT DEFAULT NULL, CHANGE storage_id storage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE storage_entity CHANGE memory memory VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE extensible extensible VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE maximum maximum VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE system_entity CHANGE interface interface VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
