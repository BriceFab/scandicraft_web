<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201229211515 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO `images` (`title`, `alt`, `name`, `src`, `image_key`) VALUES ('Minecraft PvP/Faction', 'Minecraft PvP/Faction', 'Home slide 1', 'home_slide_1.png', 'home_slide_1');");
        $this->addSql("INSERT INTO `images` (`title`, `alt`, `name`, `src`, `image_key`) VALUES ('Minecraft PvP/Faction', 'Minecraft PvP/Faction', 'Home slide 2', 'home_slide_2.png', 'home_slide_2');");
        $this->addSql("INSERT INTO `images` (`title`, `alt`, `name`, `src`, `image_key`) VALUES ('Minecraft PvP/Faction', 'Minecraft PvP/Faction', 'Home slide 3', 'home_slide_3.png', 'home_slide_3');");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
