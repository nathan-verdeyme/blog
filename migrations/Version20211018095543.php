<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211018095543 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classement ADD type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE classement ADD CONSTRAINT FK_55EE9D6DC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_55EE9D6DC54C8C93 ON classement (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classement DROP FOREIGN KEY FK_55EE9D6DC54C8C93');
        $this->addSql('DROP INDEX IDX_55EE9D6DC54C8C93 ON classement');
        $this->addSql('ALTER TABLE classement DROP type_id');
    }
}
