<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210417191450 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponses ADD question_de_reponses_id INT NOT NULL');
        $this->addSql('ALTER TABLE reponses ADD CONSTRAINT FK_1E512EC67E56B642 FOREIGN KEY (question_de_reponses_id) REFERENCES questions (id)');
        $this->addSql('CREATE INDEX IDX_1E512EC67E56B642 ON reponses (question_de_reponses_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponses DROP FOREIGN KEY FK_1E512EC67E56B642');
        $this->addSql('DROP INDEX IDX_1E512EC67E56B642 ON reponses');
        $this->addSql('ALTER TABLE reponses DROP question_de_reponses_id');
    }
}
