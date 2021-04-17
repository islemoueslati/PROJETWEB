<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210415154735 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponses ADD reponses_de_question_id INT NOT NULL');
        $this->addSql('ALTER TABLE reponses ADD CONSTRAINT FK_1E512EC6216C6D63 FOREIGN KEY (reponses_de_question_id) REFERENCES questions (id)');
        $this->addSql('CREATE INDEX IDX_1E512EC6216C6D63 ON reponses (reponses_de_question_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponses DROP FOREIGN KEY FK_1E512EC6216C6D63');
        $this->addSql('DROP INDEX IDX_1E512EC6216C6D63 ON reponses');
        $this->addSql('ALTER TABLE reponses DROP reponses_de_question_id');
    }
}
