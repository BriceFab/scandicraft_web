<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201211233050 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO `parameter` (`param_key`, `value`, `description`, `param_type`) VALUES ('param.site.logo', 'null', 'Logo du site', 'image');");
        $this->addSql("INSERT INTO `parameter` (`param_key`, `value`, `description`, `param_type`) VALUES ('param.unknown.background', 'unknown.jpg', 'Image de remplacement', 'image');");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
