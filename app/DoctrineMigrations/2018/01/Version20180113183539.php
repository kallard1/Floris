<?php declare(strict_types = 1);

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180113183539 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE product DROP CONSTRAINT fk_d34a04adf684f7c7');
        $this->addSql('DROP INDEX uniq_d34a04adf684f7c7');
        $this->addSql('ALTER TABLE product RENAME COLUMN vat_rate TO vat_id');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADB5B63A6B FOREIGN KEY (vat_id) REFERENCES vat_rate (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D34A04ADB5B63A6B ON product (vat_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04ADB5B63A6B');
        $this->addSql('DROP INDEX IDX_D34A04ADB5B63A6B');
        $this->addSql('ALTER TABLE product RENAME COLUMN vat_id TO vat_rate');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT fk_d34a04adf684f7c7 FOREIGN KEY (vat_rate) REFERENCES vat_rate (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_d34a04adf684f7c7 ON product (vat_rate)');
    }
}
