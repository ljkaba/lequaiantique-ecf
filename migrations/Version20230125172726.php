<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230125172726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menus_carte (menus_id INT NOT NULL, carte_id INT NOT NULL, INDEX IDX_EBB6185114041B84 (menus_id), INDEX IDX_EBB61851C9C7CEB6 (carte_id), PRIMARY KEY(menus_id, carte_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menus_carte ADD CONSTRAINT FK_EBB6185114041B84 FOREIGN KEY (menus_id) REFERENCES menus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menus_carte ADD CONSTRAINT FK_EBB61851C9C7CEB6 FOREIGN KEY (carte_id) REFERENCES carte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservations ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_4DA239A76ED395 ON reservations (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menus_carte DROP FOREIGN KEY FK_EBB6185114041B84');
        $this->addSql('ALTER TABLE menus_carte DROP FOREIGN KEY FK_EBB61851C9C7CEB6');
        $this->addSql('DROP TABLE menus_carte');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA239A76ED395');
        $this->addSql('DROP INDEX IDX_4DA239A76ED395 ON reservations');
        $this->addSql('ALTER TABLE reservations DROP user_id');
    }
}
