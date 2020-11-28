<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201128095728 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action_log ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE attachment ADD updated_at DATETIME DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE dev_progression ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE exception_log ADD updated_at DATETIME DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE faq ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE forum_category ADD updated_at DATETIME DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE forum_discussion ADD updated_at DATETIME DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE forum_discussion_answer ADD updated_at DATETIME DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE forum_discussion_status ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE my_socialmedia ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE parameter ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE payment_offers ADD updated_at DATETIME DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE payment_types ADD updated_at DATETIME DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE socialmedia_type ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE spoil ADD updated_at DATETIME DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE spoil_goal_type ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE spoil_share ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE staff ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE staff_category ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE store_article ADD updated_at DATETIME DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE store_category ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE survey ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE survey_answer_list ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE survey_answers ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE survey_comments ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE thanks ADD updated_at DATETIME DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE thanks_category ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user_ip ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user_socialmedia ADD updated_at DATETIME DEFAULT NULL, ADD created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user_vote ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE vote_site ADD updated_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action_log DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE attachment DROP updated_at, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE dev_progression DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE exception_log DROP updated_at, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE faq DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE forum_category DROP updated_at, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE forum_discussion DROP updated_at, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE forum_discussion_answer DROP updated_at, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE forum_discussion_status DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE my_socialmedia DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE parameter DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE payment_offers DROP updated_at, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE payment_types DROP updated_at, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE socialmedia_type DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE spoil DROP updated_at, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE spoil_goal_type DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE spoil_share DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE staff DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE staff_category DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE store_article DROP updated_at, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE store_category DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE survey DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE survey_answer_list DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE survey_answers DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE survey_comments DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE thanks DROP updated_at, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE thanks_category DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE user_ip DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE user_socialmedia DROP updated_at, DROP created_at');
        $this->addSql('ALTER TABLE user_vote DROP updated_at');
        $this->addSql('ALTER TABLE vote_site DROP updated_at');
    }
}
