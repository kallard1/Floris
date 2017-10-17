<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171017203514 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE product_quote_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE product_quote (id INT NOT NULL, quantity SMALLINT NOT NULL, price NUMERIC(10, 2) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE product_quote_quote (product_quote_id INT NOT NULL, quote_id INT NOT NULL, PRIMARY KEY(product_quote_id, quote_id))');
        $this->addSql('CREATE INDEX IDX_CAA1D88A10303BEF ON product_quote_quote (product_quote_id)');
        $this->addSql('CREATE INDEX IDX_CAA1D88ADB805178 ON product_quote_quote (quote_id)');
        $this->addSql('ALTER TABLE product_quote_quote ADD CONSTRAINT FK_CAA1D88A10303BEF FOREIGN KEY (product_quote_id) REFERENCES product_quote (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_quote_quote ADD CONSTRAINT FK_CAA1D88ADB805178 FOREIGN KEY (quote_id) REFERENCES quote (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product ADD product_quote_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD10303BEF FOREIGN KEY (product_quote_id) REFERENCES product_quote (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D34A04AD10303BEF ON product (product_quote_id)');
        $this->addSql('ALTER TABLE quote ADD customer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE quote ADD address_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF49395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4F5B7AF75 FOREIGN KEY (address_id) REFERENCES address_customer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_6B71CBF49395C3F3 ON quote (customer_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6B71CBF4F5B7AF75 ON quote (address_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE product_quote_quote DROP CONSTRAINT FK_CAA1D88A10303BEF');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD10303BEF');
        $this->addSql('DROP SEQUENCE product_quote_id_seq CASCADE');
        $this->addSql('DROP TABLE product_quote');
        $this->addSql('DROP TABLE product_quote_quote');
        $this->addSql('ALTER TABLE quote DROP CONSTRAINT FK_6B71CBF49395C3F3');
        $this->addSql('ALTER TABLE quote DROP CONSTRAINT FK_6B71CBF4F5B7AF75');
        $this->addSql('DROP INDEX IDX_6B71CBF49395C3F3');
        $this->addSql('DROP INDEX UNIQ_6B71CBF4F5B7AF75');
        $this->addSql('ALTER TABLE quote DROP customer_id');
        $this->addSql('ALTER TABLE quote DROP address_id');
        $this->addSql('DROP INDEX IDX_D34A04AD10303BEF');
        $this->addSql('ALTER TABLE product DROP product_quote_id');
    }
}
