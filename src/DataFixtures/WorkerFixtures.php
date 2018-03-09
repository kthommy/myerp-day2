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
        $firstNames = ['Georges', 'Vincent'];
        
        foreach ($firstNames as $i => $firstName) {
            $worker = (new Worker())
                ->setLastName('Boudin')
                ->setFirstName($firstName)
                ->setWorkingTime('23.5')
                ->setJob($this->getReference("job-$i"));
            
            $this->addReference("worker-$i", $worker);
            $manager->persist($worker);
        }
        
        $manager->flush();
    }
    
    public function getDependencies(): array
    {
        return [JobFixtures::class];
    }
}
