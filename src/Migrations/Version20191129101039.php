<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191129101039 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bon_intervention (id INT AUTO_INCREMENT NOT NULL, intervention_id INT DEFAULT NULL, pdf LONGBLOB NOT NULL, INDEX IDX_879D8FE68EAE3863 (intervention_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_final (id INT AUTO_INCREMENT NOT NULL, raison_sociale VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, codepostal INT NOT NULL, ville VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, fax VARCHAR(255) DEFAULT NULL, mobile VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, intervention_id INT DEFAULT NULL, pdf LONGBLOB NOT NULL, INDEX IDX_404021BF8EAE3863 (intervention_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervention (id INT AUTO_INCREMENT NOT NULL, fk_client_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, codepostal INT NOT NULL, ville VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, mobile VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, representant VARCHAR(255) DEFAULT NULL, fonction VARCHAR(255) DEFAULT NULL, INDEX IDX_D11814AB78B2BEB1 (fk_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervention_user (intervention_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_822CCE8B8EAE3863 (intervention_id), INDEX IDX_822CCE8BA76ED395 (user_id), PRIMARY KEY(intervention_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materiel (id INT AUTO_INCREMENT NOT NULL, intervention_id INT DEFAULT NULL, quantite INT NOT NULL, INDEX IDX_18D2B0918EAE3863 (intervention_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE piece (id INT AUTO_INCREMENT NOT NULL, materiel_id INT DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, designation VARCHAR(255) NOT NULL, prixht INT NOT NULL, INDEX IDX_44CA0B2316880AAF (materiel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE procesverbal (id INT AUTO_INCREMENT NOT NULL, intervention_id INT DEFAULT NULL, pdf LONGBLOB NOT NULL, INDEX IDX_C7763C718EAE3863 (intervention_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bon_intervention ADD CONSTRAINT FK_879D8FE68EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF8EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB78B2BEB1 FOREIGN KEY (fk_client_id) REFERENCES client_final (id)');
        $this->addSql('ALTER TABLE intervention_user ADD CONSTRAINT FK_822CCE8B8EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE intervention_user ADD CONSTRAINT FK_822CCE8BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE materiel ADD CONSTRAINT FK_18D2B0918EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id)');
        $this->addSql('ALTER TABLE piece ADD CONSTRAINT FK_44CA0B2316880AAF FOREIGN KEY (materiel_id) REFERENCES materiel (id)');
        $this->addSql('ALTER TABLE procesverbal ADD CONSTRAINT FK_C7763C718EAE3863 FOREIGN KEY (intervention_id) REFERENCES intervention (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB78B2BEB1');
        $this->addSql('ALTER TABLE bon_intervention DROP FOREIGN KEY FK_879D8FE68EAE3863');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF8EAE3863');
        $this->addSql('ALTER TABLE intervention_user DROP FOREIGN KEY FK_822CCE8B8EAE3863');
        $this->addSql('ALTER TABLE materiel DROP FOREIGN KEY FK_18D2B0918EAE3863');
        $this->addSql('ALTER TABLE procesverbal DROP FOREIGN KEY FK_C7763C718EAE3863');
        $this->addSql('ALTER TABLE piece DROP FOREIGN KEY FK_44CA0B2316880AAF');
        $this->addSql('ALTER TABLE intervention_user DROP FOREIGN KEY FK_822CCE8BA76ED395');
        $this->addSql('DROP TABLE bon_intervention');
        $this->addSql('DROP TABLE client_final');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE intervention');
        $this->addSql('DROP TABLE intervention_user');
        $this->addSql('DROP TABLE materiel');
        $this->addSql('DROP TABLE piece');
        $this->addSql('DROP TABLE procesverbal');
        $this->addSql('DROP TABLE user');
    }
}
