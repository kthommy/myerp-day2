<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = (new User())
            ->setUsername('kthommy')
            ->setPassword(
                password_hash('secret', PASSWORD_BCRYPT, ['cost' => 12])
            );

        $manager->persist($user);
        $manager->flush();
    }
}
