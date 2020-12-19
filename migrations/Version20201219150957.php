<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201219150957 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, meal INT DEFAULT NULL, flight_info VARCHAR(255) NOT NULL, INDEX IDX_1F1B251E9EF68E9C (meal), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_activity (item_id INT NOT NULL, activity_id INT NOT NULL, INDEX IDX_C079C191126F525E (item_id), INDEX IDX_C079C19181C06096 (activity_id), PRIMARY KEY(item_id, activity_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meal (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E9EF68E9C FOREIGN KEY (meal) REFERENCES meal (id)');
        $this->addSql('ALTER TABLE item_activity ADD CONSTRAINT FK_C079C191126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_activity ADD CONSTRAINT FK_C079C19181C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item_activity DROP FOREIGN KEY FK_C079C19181C06096');
        $this->addSql('ALTER TABLE item_activity DROP FOREIGN KEY FK_C079C191126F525E');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E9EF68E9C');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE item_activity');
        $this->addSql('DROP TABLE meal');
    }
}
