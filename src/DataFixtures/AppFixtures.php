<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail("contact@al-informatique.fr")
            ->setPassword("1234")
            ->setRoles(["ROLE_ADMIN"]);

            $manager->persist($admin);

            
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create();

        for ($i=0; $i < 10; $i++) { 
            $user = new User();
            $user->setEmail($faker->email())
            ->setPassword($faker->password())
            ->setRoles($user->getRoles());
        
             $manager->persist($user);
        }
        
        
        $manager->flush();
    }
}
