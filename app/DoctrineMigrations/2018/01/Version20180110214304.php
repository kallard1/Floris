<?php declare(strict_types = 1);

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180110214304 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE product DROP CONSTRAINT fk_d34a04ad43897540');
        $this->addSql('DROP INDEX uniq_d34a04ad43897540');
        $this->addSql('ALTER TABLE product RENAME COLUMN vat_rate_id TO vat_rate');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADF684F7C7 FOREIGN KEY (vat_rate) REFERENCES vat_rate (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04ADF684F7C7 ON product (vat_rate)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04ADF684F7C7');
        $this->addSql('DROP INDEX UNIQ_D34A04ADF684F7C7');
        $this->addSql('ALTER TABLE product RENAME COLUMN vat_rate TO vat_rate_id');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT fk_d34a04ad43897540 FOREIGN KEY (vat_rate_id) REFERENCES vat_rate (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_d34a04ad43897540 ON product (vat_rate_id)');
    }
}
