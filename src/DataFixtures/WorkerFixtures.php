<?php

namespace App\DataFixtures;

use App\Entity\Worker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class WorkerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $worker = (new Worker())
          ->setLastName('Gruh')
          ->setFirstName('Jean')
          ->setWorkingTime('23.5')
          ->setJob($this->getReference('job-0'));
        
        $manager->persist($worker);
        $manager->flush();
    }
    
    public function getDependencies(): array
    {
        return [JobFixtures::class];
    }
}
