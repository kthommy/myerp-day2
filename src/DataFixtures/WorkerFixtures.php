<?php

namespace App\DataFixtures;

use App\Entity\Worker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class WorkerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $worker = (new Worker())
          ->setLastName('Gruh')
          ->setFirstName('Jean')
          ->setJobTitle('Facteur-CEO')
          ->setWorkingTime('23.5')
          ->setWage('14.22');
        
        $manager->persist($worker);
        $manager->flush();
    }
}
