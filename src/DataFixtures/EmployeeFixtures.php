<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EmployeeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $employees = [
            [10001, 'Jean', 'Dupont'],
            [10002, 'Marie', 'Martin'],
            [10007, 'Paul', 'Durand'],
            [10010, 'Sophie', 'Bernard'],
        ];

        foreach ($employees as [$empNo, $firstname, $lastname]) {
            $employee = new Employee();
            $employee->setEmpNo($empNo);
            $employee->setFirstname($firstname);
            $employee->setLastname($lastname);

            $manager->persist($employee);
        }

        $manager->flush();
    }
}
