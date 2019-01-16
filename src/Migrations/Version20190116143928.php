<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190116143928 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, housing_id INT NOT NULL, user_id INT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, children_number INT NOT NULL, baby_number INT NOT NULL, adult_number INT NOT NULL, INDEX IDX_E00CEDDEAD5873E3 (housing_id), INDEX IDX_E00CEDDEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE owner (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, UNIQUE INDEX UNIQ_CF60E67CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE housing_equipment (id INT AUTO_INCREMENT NOT NULL, housing_id INT NOT NULL, equipment_id INT NOT NULL, INDEX IDX_4A001DAAD5873E3 (housing_id), INDEX IDX_4A001DA517FE9FE (equipment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bedroom (id INT AUTO_INCREMENT NOT NULL, housing_id INT NOT NULL, common TINYINT(1) NOT NULL, INDEX IDX_E6154351AD5873E3 (housing_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, housing_id INT NOT NULL, user_id INT NOT NULL, comment VARCHAR(512) NOT NULL, date DATETIME NOT NULL, note INT NOT NULL, INDEX IDX_794381C6AD5873E3 (housing_id), INDEX IDX_794381C6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, street_number VARCHAR(8) NOT NULL, street VARCHAR(255) NOT NULL, postal_code VARCHAR(10) NOT NULL, city VARCHAR(64) NOT NULL, INDEX IDX_D4E6F81F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE alert (id INT AUTO_INCREMENT NOT NULL, housing_id INT NOT NULL, user_id INT NOT NULL, type_alert_id INT NOT NULL, INDEX IDX_17FD46C1AD5873E3 (housing_id), INDEX IDX_17FD46C1A76ED395 (user_id), INDEX IDX_17FD46C15EFC788E (type_alert_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, address_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone VARCHAR(14) NOT NULL, email VARCHAR(255) NOT NULL, birthday DATETIME NOT NULL, sex TINYINT(1) NOT NULL, language VARCHAR(60) NOT NULL, description VARCHAR(2048) NOT NULL, url_picture VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, INDEX IDX_8D93D649F5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bed (id INT AUTO_INCREMENT NOT NULL, bedroom_id INT NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_E647FCFFBDB6797C (bedroom_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon_url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, housing_id INT NOT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_14B78418AD5873E3 (housing_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_alert (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE housing (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, address_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(2048) NOT NULL, max_traveler INT NOT NULL, bathroom_number INT NOT NULL, default_price DOUBLE PRECISION NOT NULL, min_days INT NOT NULL, traveler_supp INT NOT NULL, supp_price DOUBLE PRECISION NOT NULL, area INT NOT NULL, INDEX IDX_FB8142C37E3C61F9 (owner_id), INDEX IDX_FB8142C3F5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bookmarks (id INT AUTO_INCREMENT NOT NULL, housing_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_78D2C140AD5873E3 (housing_id), INDEX IDX_78D2C140A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEAD5873E3 FOREIGN KEY (housing_id) REFERENCES housing (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE owner ADD CONSTRAINT FK_CF60E67CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE housing_equipment ADD CONSTRAINT FK_4A001DAAD5873E3 FOREIGN KEY (housing_id) REFERENCES housing (id)');
        $this->addSql('ALTER TABLE housing_equipment ADD CONSTRAINT FK_4A001DA517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id)');
        $this->addSql('ALTER TABLE bedroom ADD CONSTRAINT FK_E6154351AD5873E3 FOREIGN KEY (housing_id) REFERENCES housing (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6AD5873E3 FOREIGN KEY (housing_id) REFERENCES housing (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE alert ADD CONSTRAINT FK_17FD46C1AD5873E3 FOREIGN KEY (housing_id) REFERENCES housing (id)');
        $this->addSql('ALTER TABLE alert ADD CONSTRAINT FK_17FD46C1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE alert ADD CONSTRAINT FK_17FD46C15EFC788E FOREIGN KEY (type_alert_id) REFERENCES type_alert (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE bed ADD CONSTRAINT FK_E647FCFFBDB6797C FOREIGN KEY (bedroom_id) REFERENCES bedroom (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418AD5873E3 FOREIGN KEY (housing_id) REFERENCES housing (id)');
        $this->addSql('ALTER TABLE housing ADD CONSTRAINT FK_FB8142C37E3C61F9 FOREIGN KEY (owner_id) REFERENCES owner (id)');
        $this->addSql('ALTER TABLE housing ADD CONSTRAINT FK_FB8142C3F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE bookmarks ADD CONSTRAINT FK_78D2C140AD5873E3 FOREIGN KEY (housing_id) REFERENCES housing (id)');
        $this->addSql('ALTER TABLE bookmarks ADD CONSTRAINT FK_78D2C140A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE housing DROP FOREIGN KEY FK_FB8142C37E3C61F9');
        $this->addSql('ALTER TABLE bed DROP FOREIGN KEY FK_E647FCFFBDB6797C');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81F92F3E70');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F5B7AF75');
        $this->addSql('ALTER TABLE housing DROP FOREIGN KEY FK_FB8142C3F5B7AF75');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEA76ED395');
        $this->addSql('ALTER TABLE owner DROP FOREIGN KEY FK_CF60E67CA76ED395');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6A76ED395');
        $this->addSql('ALTER TABLE alert DROP FOREIGN KEY FK_17FD46C1A76ED395');
        $this->addSql('ALTER TABLE bookmarks DROP FOREIGN KEY FK_78D2C140A76ED395');
        $this->addSql('ALTER TABLE housing_equipment DROP FOREIGN KEY FK_4A001DA517FE9FE');
        $this->addSql('ALTER TABLE alert DROP FOREIGN KEY FK_17FD46C15EFC788E');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEAD5873E3');
        $this->addSql('ALTER TABLE housing_equipment DROP FOREIGN KEY FK_4A001DAAD5873E3');
        $this->addSql('ALTER TABLE bedroom DROP FOREIGN KEY FK_E6154351AD5873E3');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6AD5873E3');
        $this->addSql('ALTER TABLE alert DROP FOREIGN KEY FK_17FD46C1AD5873E3');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418AD5873E3');
        $this->addSql('ALTER TABLE bookmarks DROP FOREIGN KEY FK_78D2C140AD5873E3');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE owner');
        $this->addSql('DROP TABLE housing_equipment');
        $this->addSql('DROP TABLE bedroom');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE alert');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE bed');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE type_alert');
        $this->addSql('DROP TABLE housing');
        $this->addSql('DROP TABLE bookmarks');
    }
}
