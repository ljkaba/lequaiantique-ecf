<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230125174012 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE galerie_carte (galerie_id INT NOT NULL, carte_id INT NOT NULL, INDEX IDX_EB52F06B825396CB (galerie_id), INDEX IDX_EB52F06BC9C7CEB6 (carte_id), PRIMARY KEY(galerie_id, carte_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE galerie_carte ADD CONSTRAINT FK_EB52F06B825396CB FOREIGN KEY (galerie_id) REFERENCES galerie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE galerie_carte ADD CONSTRAINT FK_EB52F06BC9C7CEB6 FOREIGN KEY (carte_id) REFERENCES carte (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE galerie_carte DROP FOREIGN KEY FK_EB52F06B825396CB');
        $this->addSql('ALTER TABLE galerie_carte DROP FOREIGN KEY FK_EB52F06BC9C7CEB6');
        $this->addSql('DROP TABLE galerie_carte');
    }
}
