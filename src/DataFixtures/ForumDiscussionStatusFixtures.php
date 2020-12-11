<?php

namespace App\DataFixtures;

use App\Entity\ForumDiscussionStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class ForumDiscussionStatusFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        $status = new ForumDiscussionStatus();
        $status->setStatus('ouvert'); //id = 1
        $status->setInfo('Ouvert à la discussion');
        $status->setColor('success');
        $manager->persist($status);

        $status = new ForumDiscussionStatus();
        $status->setStatus('fermer'); //id = 2
        $status->setInfo('Fermé à la discussion');
        $status->setColor('danger');
        $manager->persist($status);

        $status = new ForumDiscussionStatus();
        $status->setStatus('accepter'); //id = 3
        $status->setInfo('Candidature acceptée');
        $status->setColor('success');
        $manager->persist($status);

        $status = new ForumDiscussionStatus();
        $status->setStatus('refuser'); //id = 4
        $status->setInfo('Candidature refusée');
        $status->setColor('danger');
        $manager->persist($status);

        $status = new ForumDiscussionStatus();
        $status->setStatus('en_attente'); //id = 5
        $status->setInfo('Candidature en attente de réponses');
        $status->setColor('warning');
        $manager->persist($status);

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['base', 'form_discussion'];
    }
}
