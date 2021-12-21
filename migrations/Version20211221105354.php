<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211221105354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE account_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE administrator_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE card_reception_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE chief_doctor_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE department_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE doctor_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE invoice_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE passport_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE patient_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE patient_card_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE position_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE referral_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE specialty_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE ticket_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE timetable_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE account (id INT NOT NULL, passport_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, patronymic VARCHAR(50) DEFAULT NULL, login VARCHAR(50) NOT NULL, phone_number VARCHAR(12) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7D3656A4E7927C74 ON account (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7D3656A4ABF410D0 ON account (passport_id)');
        $this->addSql('CREATE TABLE administrator (id INT NOT NULL, account_id INT NOT NULL, last_interaction TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_58DF06519B6B5FBA ON administrator (account_id)');
        $this->addSql('CREATE TABLE card_reception (id INT NOT NULL, ticket_id INT NOT NULL, patient_card_id INT NOT NULL, card_reception_start_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, card_reception_end_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, card_reception_conclusion VARCHAR(255) NOT NULL, card_reception_info VARCHAR(3000) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_24DE667B700047D2 ON card_reception (ticket_id)');
        $this->addSql('CREATE INDEX IDX_24DE667B17AFCFCB ON card_reception (patient_card_id)');
        $this->addSql('CREATE TABLE chief_doctor (id INT NOT NULL, department_id INT NOT NULL, account_id INT NOT NULL, date_inauguration DATE NOT NULL, date_dismissal DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_98138610AE80F5DF ON chief_doctor (department_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_981386109B6B5FBA ON chief_doctor (account_id)');
        $this->addSql('CREATE TABLE department (id INT NOT NULL, department_description VARCHAR(2000) NOT NULL, department_date_create DATE NOT NULL, department_name VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE department_referral (department_id INT NOT NULL, referral_id INT NOT NULL, PRIMARY KEY(department_id, referral_id))');
        $this->addSql('CREATE INDEX IDX_4AB9872AAE80F5DF ON department_referral (department_id)');
        $this->addSql('CREATE INDEX IDX_4AB9872A3CCAA4B7 ON department_referral (referral_id)');
        $this->addSql('CREATE TABLE doctor (id INT NOT NULL, account_id INT NOT NULL, department_id INT NOT NULL, specialty_id INT NOT NULL, position_id INT NOT NULL, cabinet_number VARCHAR(4) DEFAULT NULL, doctor_experience INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1FC0F36A9B6B5FBA ON doctor (account_id)');
        $this->addSql('CREATE INDEX IDX_1FC0F36AAE80F5DF ON doctor (department_id)');
        $this->addSql('CREATE INDEX IDX_1FC0F36A9A353316 ON doctor (specialty_id)');
        $this->addSql('CREATE INDEX IDX_1FC0F36ADD842E46 ON doctor (position_id)');
        $this->addSql('CREATE TABLE invoice (id INT NOT NULL, ticket_id INT NOT NULL, invoice_status BOOLEAN NOT NULL, invoice_price NUMERIC(8, 2) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_90651744700047D2 ON invoice (ticket_id)');
        $this->addSql('CREATE TABLE passport (id INT NOT NULL, birthday DATE NOT NULL, passport_series VARCHAR(4) NOT NULL, passport_number VARCHAR(6) NOT NULL, passport_issued_by VARCHAR(255) NOT NULL, sex BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE patient (id INT NOT NULL, account_id INT NOT NULL, patient_snills VARCHAR(14) NOT NULL, patient_jms VARCHAR(16) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1ADAD7EB9B6B5FBA ON patient (account_id)');
        $this->addSql('CREATE TABLE patient_card (id INT NOT NULL, patient_id INT NOT NULL, patient_card_create_date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9F85D51B6B899279 ON patient_card (patient_id)');
        $this->addSql('CREATE TABLE position (id INT NOT NULL, position_salary NUMERIC(8, 2) NOT NULL, position_name VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE referral (id INT NOT NULL, referral_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE specialty (id INT NOT NULL, specialty_name VARCHAR(100) NOT NULL, specialty_duration TIME(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE ticket (id INT NOT NULL, patient_id INT NOT NULL, doctor_id INT NOT NULL, ticket_payable BOOLEAN NOT NULL, ticket_create_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, ticket_status BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_97A0ADA36B899279 ON ticket (patient_id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA387F4FB17 ON ticket (doctor_id)');
        $this->addSql('CREATE TABLE timetable (id INT NOT NULL, doctor_id INT NOT NULL, timetable_status BOOLEAN NOT NULL, timetable_end_time TIME(0) WITHOUT TIME ZONE NOT NULL, timetable_start_time TIME(0) WITHOUT TIME ZONE NOT NULL, timetable_week_day INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6B1F67087F4FB17 ON timetable (doctor_id)');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A4ABF410D0 FOREIGN KEY (passport_id) REFERENCES passport (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE administrator ADD CONSTRAINT FK_58DF06519B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE card_reception ADD CONSTRAINT FK_24DE667B700047D2 FOREIGN KEY (ticket_id) REFERENCES ticket (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE card_reception ADD CONSTRAINT FK_24DE667B17AFCFCB FOREIGN KEY (patient_card_id) REFERENCES patient_card (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE chief_doctor ADD CONSTRAINT FK_98138610AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE chief_doctor ADD CONSTRAINT FK_981386109B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE department_referral ADD CONSTRAINT FK_4AB9872AAE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE department_referral ADD CONSTRAINT FK_4AB9872A3CCAA4B7 FOREIGN KEY (referral_id) REFERENCES referral (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT FK_1FC0F36A9B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT FK_1FC0F36AAE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT FK_1FC0F36A9A353316 FOREIGN KEY (specialty_id) REFERENCES specialty (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT FK_1FC0F36ADD842E46 FOREIGN KEY (position_id) REFERENCES position (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_90651744700047D2 FOREIGN KEY (ticket_id) REFERENCES ticket (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB9B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE patient_card ADD CONSTRAINT FK_9F85D51B6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA36B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA387F4FB17 FOREIGN KEY (doctor_id) REFERENCES doctor (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE timetable ADD CONSTRAINT FK_6B1F67087F4FB17 FOREIGN KEY (doctor_id) REFERENCES doctor (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE administrator DROP CONSTRAINT FK_58DF06519B6B5FBA');
        $this->addSql('ALTER TABLE chief_doctor DROP CONSTRAINT FK_981386109B6B5FBA');
        $this->addSql('ALTER TABLE doctor DROP CONSTRAINT FK_1FC0F36A9B6B5FBA');
        $this->addSql('ALTER TABLE patient DROP CONSTRAINT FK_1ADAD7EB9B6B5FBA');
        $this->addSql('ALTER TABLE chief_doctor DROP CONSTRAINT FK_98138610AE80F5DF');
        $this->addSql('ALTER TABLE department_referral DROP CONSTRAINT FK_4AB9872AAE80F5DF');
        $this->addSql('ALTER TABLE doctor DROP CONSTRAINT FK_1FC0F36AAE80F5DF');
        $this->addSql('ALTER TABLE ticket DROP CONSTRAINT FK_97A0ADA387F4FB17');
        $this->addSql('ALTER TABLE timetable DROP CONSTRAINT FK_6B1F67087F4FB17');
        $this->addSql('ALTER TABLE account DROP CONSTRAINT FK_7D3656A4ABF410D0');
        $this->addSql('ALTER TABLE patient_card DROP CONSTRAINT FK_9F85D51B6B899279');
        $this->addSql('ALTER TABLE ticket DROP CONSTRAINT FK_97A0ADA36B899279');
        $this->addSql('ALTER TABLE card_reception DROP CONSTRAINT FK_24DE667B17AFCFCB');
        $this->addSql('ALTER TABLE doctor DROP CONSTRAINT FK_1FC0F36ADD842E46');
        $this->addSql('ALTER TABLE department_referral DROP CONSTRAINT FK_4AB9872A3CCAA4B7');
        $this->addSql('ALTER TABLE doctor DROP CONSTRAINT FK_1FC0F36A9A353316');
        $this->addSql('ALTER TABLE card_reception DROP CONSTRAINT FK_24DE667B700047D2');
        $this->addSql('ALTER TABLE invoice DROP CONSTRAINT FK_90651744700047D2');
        $this->addSql('DROP SEQUENCE account_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE administrator_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE card_reception_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE chief_doctor_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE department_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE doctor_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE invoice_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE passport_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE patient_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE patient_card_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE position_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE referral_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE specialty_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE ticket_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE timetable_id_seq CASCADE');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE administrator');
        $this->addSql('DROP TABLE card_reception');
        $this->addSql('DROP TABLE chief_doctor');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE department_referral');
        $this->addSql('DROP TABLE doctor');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE passport');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE patient_card');
        $this->addSql('DROP TABLE position');
        $this->addSql('DROP TABLE referral');
        $this->addSql('DROP TABLE specialty');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('DROP TABLE timetable');
    }
}
