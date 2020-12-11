<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use App\Classes\EnumParamType;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201211224840 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $defaultType = EnumParamType::STRING;
        $this->addSql("ALTER TABLE parameter ADD param_type VARCHAR(255) NOT NULL DEFAULT '$defaultType'");
        $this->addSql("UPDATE parameter SET param_type '$defaultType' WHEN param_type IS NULL");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parameter DROP param_type');
    }
}
