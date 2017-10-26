<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171021143028 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_quote_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE customer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE quote_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE vat_rate_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE address_customer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE category (id INT NOT NULL, name VARCHAR(45) NOT NULL, description TEXT DEFAULT NULL, status BOOLEAN DEFAULT \'false\' NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_64C19C15E237E06 ON category (name)');
        $this->addSql('CREATE TABLE product_quote (id INT NOT NULL, quantity SMALLINT NOT NULL, price NUMERIC(10, 2) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE product_quote_quote (product_quote_id INT NOT NULL, quote_id INT NOT NULL, PRIMARY KEY(product_quote_id, quote_id))');
        $this->addSql('CREATE INDEX IDX_CAA1D88A10303BEF ON product_quote_quote (product_quote_id)');
        $this->addSql('CREATE INDEX IDX_CAA1D88ADB805178 ON product_quote_quote (quote_id)');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, vat_rate_id INT DEFAULT NULL, product_quote_id INT DEFAULT NULL, name VARCHAR(45) NOT NULL, description TEXT NOT NULL, sku VARCHAR(20) NOT NULL, price NUMERIC(10, 2) NOT NULL, status BOOLEAN DEFAULT \'false\' NOT NULL, stock SMALLINT DEFAULT 0 NOT NULL, promotion SMALLINT DEFAULT 0 NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04ADF9038C4 ON product (sku)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04AD43897540 ON product (vat_rate_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD10303BEF ON product (product_quote_id)');
        $this->addSql('CREATE TABLE product_category (product_id INT NOT NULL, category_id INT NOT NULL, PRIMARY KEY(product_id, category_id))');
        $this->addSql('CREATE INDEX IDX_CDFC73564584665A ON product_category (product_id)');
        $this->addSql('CREATE INDEX IDX_CDFC735612469DE2 ON product_category (category_id)');
        $this->addSql('CREATE TABLE customer (id INT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled BOOLEAN NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, roles TEXT NOT NULL, business_name VARCHAR(255) NOT NULL, vat_number VARCHAR(13) NOT NULL, company_register VARCHAR(14) NOT NULL, ip VARCHAR(15) NOT NULL, token VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_81398E0992FC23A8 ON customer (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_81398E09A0D96FBF ON customer (email_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_81398E09C05FB297 ON customer (confirmation_token)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_81398E098910B08D ON customer (vat_number)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_81398E09476E5579 ON customer (company_register)');
        $this->addSql('COMMENT ON COLUMN customer.roles IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE quote (id INT NOT NULL, customer_id INT DEFAULT NULL, address_id INT DEFAULT NULL, comment TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6B71CBF49395C3F3 ON quote (customer_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6B71CBF4F5B7AF75 ON quote (address_id)');
        $this->addSql('CREATE TABLE vat_rate (id INT NOT NULL, name VARCHAR(45) NOT NULL, rate SMALLINT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F684F7C75E237E06 ON vat_rate (name)');
        $this->addSql('CREATE TABLE address_customer (id INT NOT NULL, customer_id INT DEFAULT NULL, line1 VARCHAR(255) NOT NULL, line2 VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(10) NOT NULL, city VARCHAR(50) NOT NULL, country VARCHAR(75) NOT NULL, phone VARCHAR(15) NOT NULL, as_default BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7FB670889395C3F3 ON address_customer (customer_id)');
        $this->addSql('ALTER TABLE product_quote_quote ADD CONSTRAINT FK_CAA1D88A10303BEF FOREIGN KEY (product_quote_id) REFERENCES product_quote (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_quote_quote ADD CONSTRAINT FK_CAA1D88ADB805178 FOREIGN KEY (quote_id) REFERENCES quote (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD43897540 FOREIGN KEY (vat_rate_id) REFERENCES vat_rate (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD10303BEF FOREIGN KEY (product_quote_id) REFERENCES product_quote (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_category ADD CONSTRAINT FK_CDFC73564584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_category ADD CONSTRAINT FK_CDFC735612469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF49395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4F5B7AF75 FOREIGN KEY (address_id) REFERENCES address_customer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE address_customer ADD CONSTRAINT FK_7FB670889395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE product_category DROP CONSTRAINT FK_CDFC735612469DE2');
        $this->addSql('ALTER TABLE product_quote_quote DROP CONSTRAINT FK_CAA1D88A10303BEF');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD10303BEF');
        $this->addSql('ALTER TABLE product_category DROP CONSTRAINT FK_CDFC73564584665A');
        $this->addSql('ALTER TABLE quote DROP CONSTRAINT FK_6B71CBF49395C3F3');
        $this->addSql('ALTER TABLE address_customer DROP CONSTRAINT FK_7FB670889395C3F3');
        $this->addSql('ALTER TABLE product_quote_quote DROP CONSTRAINT FK_CAA1D88ADB805178');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD43897540');
        $this->addSql('ALTER TABLE quote DROP CONSTRAINT FK_6B71CBF4F5B7AF75');
        $this->addSql('DROP SEQUENCE category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_quote_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE customer_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE quote_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE vat_rate_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE address_customer_id_seq CASCADE');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE product_quote');
        $this->addSql('DROP TABLE product_quote_quote');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_category');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE quote');
        $this->addSql('DROP TABLE vat_rate');
        $this->addSql('DROP TABLE address_customer');
    }
}
