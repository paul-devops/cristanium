<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191116051221 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE clients ADD ville_id INT NOT NULL, ADD sexe_id INT NOT NULL, DROP ville, DROP sexe');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_CF7517E8A73F0036 FOREIGN KEY (ville_id) REFERENCES Villes (id)');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_CF7517E8448F3B3C FOREIGN KEY (sexe_id) REFERENCES sexe (id)');
        $this->addSql('CREATE INDEX IDX_CF7517E8A73F0036 ON clients (ville_id)');
        $this->addSql('CREATE INDEX IDX_CF7517E8448F3B3C ON clients (sexe_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Clients DROP FOREIGN KEY FK_CF7517E8A73F0036');
        $this->addSql('ALTER TABLE Clients DROP FOREIGN KEY FK_CF7517E8448F3B3C');
        $this->addSql('DROP INDEX IDX_CF7517E8A73F0036 ON Clients');
        $this->addSql('DROP INDEX IDX_CF7517E8448F3B3C ON Clients');
        $this->addSql('ALTER TABLE Clients ADD ville VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD sexe VARCHAR(5) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP ville_id, DROP sexe_id');
    }
}
