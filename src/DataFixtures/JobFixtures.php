<?php

namespace App\DataFixtures;

use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class JobFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $titles = ['Cuisinier', 'marcHAnd', 'Aventurier', 'clOWn', 'Voleur'];
        
        foreach ($titles as $i => $title) {
            $job = (new Job())
                ->setTitle($title)
                ->setSummary('Un super boulot.')
                ->setWage(random_int(8, 80) . '.' . random_int(0, 9) . '0');
            
            $this->addReference("job-$i", $job);
            $manager->persist($job);
        }

        $manager->flush();
    }
}
