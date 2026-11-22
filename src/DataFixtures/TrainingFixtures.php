<?php

namespace App\DataFixtures;

use App\Entity\Training;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class TrainingFixtures extends Fixture implements FixtureGroupInterface
{
    public static function getGroups(): array
    {
        return ['training'];
    }
    public function load(ObjectManager $manager): void
    {
        $trainings = [
            ['RH1', 'Management RH', 1, 5],
            ['OL7', 'Zen & Méditation', 3, -1],
            ['M12', 'Marketing digital', 2, 3],
        ];

        foreach ($trainings as [$code, $title, $duration, $places]) {
            $training = new Training();

            $training->setCode($code);
            $training->setTitle($title);
            $training->setDuration($duration);
            $training->setPlaces($places);

            $manager->persist($training);
        }

        $manager->flush();
    }
}
