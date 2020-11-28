<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201128091921 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action_log (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, method VARCHAR(255) NOT NULL, uri LONGTEXT NOT NULL, ip VARCHAR(255) NOT NULL, request_at DATETIME NOT NULL, response_code SMALLINT NOT NULL, INDEX IDX_B2C5F685A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE attachment (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, created_at DATETIME NOT NULL, url VARCHAR(255) NOT NULL, alt VARCHAR(255) DEFAULT NULL, INDEX IDX_795FD9BBB03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dev_progression (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, pourcentage INT NOT NULL, under_maintenance TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exception_log (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, method VARCHAR(255) DEFAULT NULL, uri LONGTEXT DEFAULT NULL, exception_message LONGTEXT NOT NULL, exception_code SMALLINT DEFAULT NULL, created_at DATETIME NOT NULL, ip VARCHAR(255) DEFAULT NULL, INDEX IDX_3A3168C1A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faq (id INT AUTO_INCREMENT NOT NULL, question VARCHAR(255) NOT NULL, answer LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forum_category (id INT AUTO_INCREMENT NOT NULL, created_by_id INT NOT NULL, name VARCHAR(255) NOT NULL, priority SMALLINT DEFAULT NULL, created_at DATETIME NOT NULL, active TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, entity_type VARCHAR(255) NOT NULL, INDEX IDX_21BF9426B03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forum_discussion (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, sub_category_id INT DEFAULT NULL, status_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, pin TINYINT(1) DEFAULT \'0\' NOT NULL, archive TINYINT(1) DEFAULT \'0\' NOT NULL, created_at DATETIME NOT NULL, staff_only TINYINT(1) DEFAULT \'0\' NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_428F444AB03A8386 (created_by_id), INDEX IDX_428F444AF7BFE87C (sub_category_id), INDEX IDX_428F444A6BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forum_discussion_answer (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, discussion_id INT DEFAULT NULL, created_at DATETIME NOT NULL, message LONGTEXT NOT NULL, INDEX IDX_55F7781EB03A8386 (created_by_id), INDEX IDX_55F7781E1ADED311 (discussion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forum_discussion_status (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(255) NOT NULL, info VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forum_sub_category (id INT NOT NULL, category_id INT NOT NULL, writable TINYINT(1) DEFAULT \'1\' NOT NULL, description LONGTEXT DEFAULT NULL, accept_staff_only TINYINT(1) DEFAULT \'0\' NOT NULL, sub_title VARCHAR(255) DEFAULT NULL, INDEX IDX_843D01DF12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE my_socialmedia (id INT AUTO_INCREMENT NOT NULL, socialmedia_type_id INT NOT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_8A8D863B2263C14C (socialmedia_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parameter (id INT AUTO_INCREMENT NOT NULL, param_key VARCHAR(255) NOT NULL, value LONGTEXT NOT NULL, description LONGTEXT DEFAULT NULL, expiration_date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment_offers (id INT AUTO_INCREMENT NOT NULL, payment_type_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, enable TINYINT(1) NOT NULL, debit_price NUMERIC(5, 2) NOT NULL, credit_receive INT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_FF7E9FB1DC058279 (payment_type_id), INDEX IDX_FF7E9FB1B03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment_types (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, enable TINYINT(1) NOT NULL, help_text VARCHAR(255) NOT NULL, dynamic_key VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_E79BF82B03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE socialmedia_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, enable TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spoil (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, goal_type_id INT DEFAULT NULL, created_at DATETIME NOT NULL, image LONGTEXT DEFAULT NULL, description LONGTEXT DEFAULT NULL, share_goal INT DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_A0DFBC1EB03A8386 (created_by_id), INDEX IDX_A0DFBC1EB4678E6F (goal_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spoil_attachment (spoil_id INT NOT NULL, attachment_id INT NOT NULL, INDEX IDX_13ADC4DD2EE5651B (spoil_id), INDEX IDX_13ADC4DD464E68B (attachment_id), PRIMARY KEY(spoil_id, attachment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spoil_goal_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spoil_share (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, spoil_id INT NOT NULL, social_id INT NOT NULL, share_at DATETIME NOT NULL, INDEX IDX_2E9A0397A76ED395 (user_id), INDEX IDX_2E9A03972EE5651B (spoil_id), INDEX IDX_2E9A0397FFEB5B27 (social_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staff (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, category_id INT NOT NULL, presentation LONGTEXT DEFAULT NULL, since DATETIME NOT NULL, head_link VARCHAR(255) NOT NULL, enable TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_426EF392A76ED395 (user_id), INDEX IDX_426EF39212469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staff_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, subtitle VARCHAR(255) NOT NULL, priority SMALLINT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store_article (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, duration INT DEFAULT NULL, enable TINYINT(1) NOT NULL, price INT NOT NULL, until_date DATETIME DEFAULT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_1B322F81B03A8386 (created_by_id), INDEX IDX_1B322F8112469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store_article_attachment (store_article_id INT NOT NULL, attachment_id INT NOT NULL, INDEX IDX_333B5EE85C7DDD71 (store_article_id), INDEX IDX_333B5EE8464E68B (attachment_id), PRIMARY KEY(store_article_id, attachment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, enable TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE survey (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, from_the_date DATETIME NOT NULL, answer_delay INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_AD5F9BFCA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE survey_survey_answer_list (survey_id INT NOT NULL, survey_answer_list_id INT NOT NULL, INDEX IDX_B3C93869B3FE509D (survey_id), INDEX IDX_B3C93869C6E3B857 (survey_answer_list_id), PRIMARY KEY(survey_id, survey_answer_list_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE survey_answer_list (id INT AUTO_INCREMENT NOT NULL, created_by_id INT NOT NULL, answer VARCHAR(30) NOT NULL, UNIQUE INDEX UNIQ_A21BC4DDDADD4A25 (answer), INDEX IDX_A21BC4DDB03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE survey_answers (id INT AUTO_INCREMENT NOT NULL, survey_id INT NOT NULL, user_id INT NOT NULL, answer_id INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_14FCE5BDB3FE509D (survey_id), INDEX IDX_14FCE5BDA76ED395 (user_id), INDEX IDX_14FCE5BDAA334807 (answer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE survey_comments (id INT AUTO_INCREMENT NOT NULL, survey_id INT NOT NULL, user_id INT NOT NULL, comment LONGTEXT NOT NULL, comment_at DATETIME NOT NULL, INDEX IDX_369D00DB3FE509D (survey_id), INDEX IDX_369D00DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thanks (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, thanks_category_id INT NOT NULL, presentation LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, head_link VARCHAR(255) NOT NULL, enable TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_6E5365EA76ED395 (user_id), INDEX IDX_6E5365EFBBF98EE (thanks_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thanks_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, subtitle VARCHAR(255) DEFAULT NULL, priority SMALLINT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, username VARCHAR(15) NOT NULL, has_confirm_email TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, last_login DATETIME DEFAULT NULL, uuid VARCHAR(255) DEFAULT NULL, credit INT NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_ip (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, ip VARCHAR(255) NOT NULL, login_at DATETIME NOT NULL, INDEX IDX_BDB407E8A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_socialmedia (id INT AUTO_INCREMENT NOT NULL, socialmedia_type_id INT NOT NULL, thanks_id INT DEFAULT NULL, staff_id INT DEFAULT NULL, user_id INT DEFAULT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_D103CBE62263C14C (socialmedia_type_id), INDEX IDX_D103CBE6591F410E (thanks_id), INDEX IDX_D103CBE6D4D57CD (staff_id), INDEX IDX_D103CBE6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_vote (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, vote_site_id INT NOT NULL, created_at DATETIME DEFAULT NULL, vote_id VARCHAR(255) DEFAULT NULL, user_ip VARCHAR(255) NOT NULL, INDEX IDX_2091C9ADA76ED395 (user_id), INDEX IDX_2091C9AD7D0F49DE (vote_site_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vote_site (id INT AUTO_INCREMENT NOT NULL, created_by_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, time_wait_vote SMALLINT NOT NULL, vote_url VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_DE21F8D5B03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE action_log ADD CONSTRAINT FK_B2C5F685A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE attachment ADD CONSTRAINT FK_795FD9BBB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE exception_log ADD CONSTRAINT FK_3A3168C1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE forum_category ADD CONSTRAINT FK_21BF9426B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE forum_discussion ADD CONSTRAINT FK_428F444AB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE forum_discussion ADD CONSTRAINT FK_428F444AF7BFE87C FOREIGN KEY (sub_category_id) REFERENCES forum_sub_category (id)');
        $this->addSql('ALTER TABLE forum_discussion ADD CONSTRAINT FK_428F444A6BF700BD FOREIGN KEY (status_id) REFERENCES forum_discussion_status (id)');
        $this->addSql('ALTER TABLE forum_discussion_answer ADD CONSTRAINT FK_55F7781EB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE forum_discussion_answer ADD CONSTRAINT FK_55F7781E1ADED311 FOREIGN KEY (discussion_id) REFERENCES forum_discussion (id)');
        $this->addSql('ALTER TABLE forum_sub_category ADD CONSTRAINT FK_843D01DF12469DE2 FOREIGN KEY (category_id) REFERENCES forum_category (id)');
        $this->addSql('ALTER TABLE forum_sub_category ADD CONSTRAINT FK_843D01DFBF396750 FOREIGN KEY (id) REFERENCES forum_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE my_socialmedia ADD CONSTRAINT FK_8A8D863B2263C14C FOREIGN KEY (socialmedia_type_id) REFERENCES socialmedia_type (id)');
        $this->addSql('ALTER TABLE payment_offers ADD CONSTRAINT FK_FF7E9FB1DC058279 FOREIGN KEY (payment_type_id) REFERENCES payment_types (id)');
        $this->addSql('ALTER TABLE payment_offers ADD CONSTRAINT FK_FF7E9FB1B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE payment_types ADD CONSTRAINT FK_E79BF82B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE spoil ADD CONSTRAINT FK_A0DFBC1EB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE spoil ADD CONSTRAINT FK_A0DFBC1EB4678E6F FOREIGN KEY (goal_type_id) REFERENCES spoil_goal_type (id)');
        $this->addSql('ALTER TABLE spoil_attachment ADD CONSTRAINT FK_13ADC4DD2EE5651B FOREIGN KEY (spoil_id) REFERENCES spoil (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE spoil_attachment ADD CONSTRAINT FK_13ADC4DD464E68B FOREIGN KEY (attachment_id) REFERENCES attachment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE spoil_share ADD CONSTRAINT FK_2E9A0397A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE spoil_share ADD CONSTRAINT FK_2E9A03972EE5651B FOREIGN KEY (spoil_id) REFERENCES spoil (id)');
        $this->addSql('ALTER TABLE spoil_share ADD CONSTRAINT FK_2E9A0397FFEB5B27 FOREIGN KEY (social_id) REFERENCES socialmedia_type (id)');
        $this->addSql('ALTER TABLE staff ADD CONSTRAINT FK_426EF392A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE staff ADD CONSTRAINT FK_426EF39212469DE2 FOREIGN KEY (category_id) REFERENCES staff_category (id)');
        $this->addSql('ALTER TABLE store_article ADD CONSTRAINT FK_1B322F81B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE store_article ADD CONSTRAINT FK_1B322F8112469DE2 FOREIGN KEY (category_id) REFERENCES store_category (id)');
        $this->addSql('ALTER TABLE store_article_attachment ADD CONSTRAINT FK_333B5EE85C7DDD71 FOREIGN KEY (store_article_id) REFERENCES store_article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE store_article_attachment ADD CONSTRAINT FK_333B5EE8464E68B FOREIGN KEY (attachment_id) REFERENCES attachment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE survey ADD CONSTRAINT FK_AD5F9BFCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE survey_survey_answer_list ADD CONSTRAINT FK_B3C93869B3FE509D FOREIGN KEY (survey_id) REFERENCES survey (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE survey_survey_answer_list ADD CONSTRAINT FK_B3C93869C6E3B857 FOREIGN KEY (survey_answer_list_id) REFERENCES survey_answer_list (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE survey_answer_list ADD CONSTRAINT FK_A21BC4DDB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE survey_answers ADD CONSTRAINT FK_14FCE5BDB3FE509D FOREIGN KEY (survey_id) REFERENCES survey (id)');
        $this->addSql('ALTER TABLE survey_answers ADD CONSTRAINT FK_14FCE5BDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE survey_answers ADD CONSTRAINT FK_14FCE5BDAA334807 FOREIGN KEY (answer_id) REFERENCES survey_answer_list (id)');
        $this->addSql('ALTER TABLE survey_comments ADD CONSTRAINT FK_369D00DB3FE509D FOREIGN KEY (survey_id) REFERENCES survey (id)');
        $this->addSql('ALTER TABLE survey_comments ADD CONSTRAINT FK_369D00DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE thanks ADD CONSTRAINT FK_6E5365EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE thanks ADD CONSTRAINT FK_6E5365EFBBF98EE FOREIGN KEY (thanks_category_id) REFERENCES thanks_category (id)');
        $this->addSql('ALTER TABLE user_ip ADD CONSTRAINT FK_BDB407E8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_socialmedia ADD CONSTRAINT FK_D103CBE62263C14C FOREIGN KEY (socialmedia_type_id) REFERENCES socialmedia_type (id)');
        $this->addSql('ALTER TABLE user_socialmedia ADD CONSTRAINT FK_D103CBE6591F410E FOREIGN KEY (thanks_id) REFERENCES thanks (id)');
        $this->addSql('ALTER TABLE user_socialmedia ADD CONSTRAINT FK_D103CBE6D4D57CD FOREIGN KEY (staff_id) REFERENCES staff (id)');
        $this->addSql('ALTER TABLE user_socialmedia ADD CONSTRAINT FK_D103CBE6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_vote ADD CONSTRAINT FK_2091C9ADA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_vote ADD CONSTRAINT FK_2091C9AD7D0F49DE FOREIGN KEY (vote_site_id) REFERENCES vote_site (id)');
        $this->addSql('ALTER TABLE vote_site ADD CONSTRAINT FK_DE21F8D5B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spoil_attachment DROP FOREIGN KEY FK_13ADC4DD464E68B');
        $this->addSql('ALTER TABLE store_article_attachment DROP FOREIGN KEY FK_333B5EE8464E68B');
        $this->addSql('ALTER TABLE forum_sub_category DROP FOREIGN KEY FK_843D01DF12469DE2');
        $this->addSql('ALTER TABLE forum_sub_category DROP FOREIGN KEY FK_843D01DFBF396750');
        $this->addSql('ALTER TABLE forum_discussion_answer DROP FOREIGN KEY FK_55F7781E1ADED311');
        $this->addSql('ALTER TABLE forum_discussion DROP FOREIGN KEY FK_428F444A6BF700BD');
        $this->addSql('ALTER TABLE forum_discussion DROP FOREIGN KEY FK_428F444AF7BFE87C');
        $this->addSql('ALTER TABLE payment_offers DROP FOREIGN KEY FK_FF7E9FB1DC058279');
        $this->addSql('ALTER TABLE my_socialmedia DROP FOREIGN KEY FK_8A8D863B2263C14C');
        $this->addSql('ALTER TABLE spoil_share DROP FOREIGN KEY FK_2E9A0397FFEB5B27');
        $this->addSql('ALTER TABLE user_socialmedia DROP FOREIGN KEY FK_D103CBE62263C14C');
        $this->addSql('ALTER TABLE spoil_attachment DROP FOREIGN KEY FK_13ADC4DD2EE5651B');
        $this->addSql('ALTER TABLE spoil_share DROP FOREIGN KEY FK_2E9A03972EE5651B');
        $this->addSql('ALTER TABLE spoil DROP FOREIGN KEY FK_A0DFBC1EB4678E6F');
        $this->addSql('ALTER TABLE user_socialmedia DROP FOREIGN KEY FK_D103CBE6D4D57CD');
        $this->addSql('ALTER TABLE staff DROP FOREIGN KEY FK_426EF39212469DE2');
        $this->addSql('ALTER TABLE store_article_attachment DROP FOREIGN KEY FK_333B5EE85C7DDD71');
        $this->addSql('ALTER TABLE store_article DROP FOREIGN KEY FK_1B322F8112469DE2');
        $this->addSql('ALTER TABLE survey_survey_answer_list DROP FOREIGN KEY FK_B3C93869B3FE509D');
        $this->addSql('ALTER TABLE survey_answers DROP FOREIGN KEY FK_14FCE5BDB3FE509D');
        $this->addSql('ALTER TABLE survey_comments DROP FOREIGN KEY FK_369D00DB3FE509D');
        $this->addSql('ALTER TABLE survey_survey_answer_list DROP FOREIGN KEY FK_B3C93869C6E3B857');
        $this->addSql('ALTER TABLE survey_answers DROP FOREIGN KEY FK_14FCE5BDAA334807');
        $this->addSql('ALTER TABLE user_socialmedia DROP FOREIGN KEY FK_D103CBE6591F410E');
        $this->addSql('ALTER TABLE thanks DROP FOREIGN KEY FK_6E5365EFBBF98EE');
        $this->addSql('ALTER TABLE action_log DROP FOREIGN KEY FK_B2C5F685A76ED395');
        $this->addSql('ALTER TABLE attachment DROP FOREIGN KEY FK_795FD9BBB03A8386');
        $this->addSql('ALTER TABLE exception_log DROP FOREIGN KEY FK_3A3168C1A76ED395');
        $this->addSql('ALTER TABLE forum_category DROP FOREIGN KEY FK_21BF9426B03A8386');
        $this->addSql('ALTER TABLE forum_discussion DROP FOREIGN KEY FK_428F444AB03A8386');
        $this->addSql('ALTER TABLE forum_discussion_answer DROP FOREIGN KEY FK_55F7781EB03A8386');
        $this->addSql('ALTER TABLE payment_offers DROP FOREIGN KEY FK_FF7E9FB1B03A8386');
        $this->addSql('ALTER TABLE payment_types DROP FOREIGN KEY FK_E79BF82B03A8386');
        $this->addSql('ALTER TABLE spoil DROP FOREIGN KEY FK_A0DFBC1EB03A8386');
        $this->addSql('ALTER TABLE spoil_share DROP FOREIGN KEY FK_2E9A0397A76ED395');
        $this->addSql('ALTER TABLE staff DROP FOREIGN KEY FK_426EF392A76ED395');
        $this->addSql('ALTER TABLE store_article DROP FOREIGN KEY FK_1B322F81B03A8386');
        $this->addSql('ALTER TABLE survey DROP FOREIGN KEY FK_AD5F9BFCA76ED395');
        $this->addSql('ALTER TABLE survey_answer_list DROP FOREIGN KEY FK_A21BC4DDB03A8386');
        $this->addSql('ALTER TABLE survey_answers DROP FOREIGN KEY FK_14FCE5BDA76ED395');
        $this->addSql('ALTER TABLE survey_comments DROP FOREIGN KEY FK_369D00DA76ED395');
        $this->addSql('ALTER TABLE thanks DROP FOREIGN KEY FK_6E5365EA76ED395');
        $this->addSql('ALTER TABLE user_ip DROP FOREIGN KEY FK_BDB407E8A76ED395');
        $this->addSql('ALTER TABLE user_socialmedia DROP FOREIGN KEY FK_D103CBE6A76ED395');
        $this->addSql('ALTER TABLE user_vote DROP FOREIGN KEY FK_2091C9ADA76ED395');
        $this->addSql('ALTER TABLE vote_site DROP FOREIGN KEY FK_DE21F8D5B03A8386');
        $this->addSql('ALTER TABLE user_vote DROP FOREIGN KEY FK_2091C9AD7D0F49DE');
        $this->addSql('DROP TABLE action_log');
        $this->addSql('DROP TABLE attachment');
        $this->addSql('DROP TABLE dev_progression');
        $this->addSql('DROP TABLE exception_log');
        $this->addSql('DROP TABLE faq');
        $this->addSql('DROP TABLE forum_category');
        $this->addSql('DROP TABLE forum_discussion');
        $this->addSql('DROP TABLE forum_discussion_answer');
        $this->addSql('DROP TABLE forum_discussion_status');
        $this->addSql('DROP TABLE forum_sub_category');
        $this->addSql('DROP TABLE my_socialmedia');
        $this->addSql('DROP TABLE parameter');
        $this->addSql('DROP TABLE payment_offers');
        $this->addSql('DROP TABLE payment_types');
        $this->addSql('DROP TABLE socialmedia_type');
        $this->addSql('DROP TABLE spoil');
        $this->addSql('DROP TABLE spoil_attachment');
        $this->addSql('DROP TABLE spoil_goal_type');
        $this->addSql('DROP TABLE spoil_share');
        $this->addSql('DROP TABLE staff');
        $this->addSql('DROP TABLE staff_category');
        $this->addSql('DROP TABLE store_article');
        $this->addSql('DROP TABLE store_article_attachment');
        $this->addSql('DROP TABLE store_category');
        $this->addSql('DROP TABLE survey');
        $this->addSql('DROP TABLE survey_survey_answer_list');
        $this->addSql('DROP TABLE survey_answer_list');
        $this->addSql('DROP TABLE survey_answers');
        $this->addSql('DROP TABLE survey_comments');
        $this->addSql('DROP TABLE thanks');
        $this->addSql('DROP TABLE thanks_category');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_ip');
        $this->addSql('DROP TABLE user_socialmedia');
        $this->addSql('DROP TABLE user_vote');
        $this->addSql('DROP TABLE vote_site');
    }
}
