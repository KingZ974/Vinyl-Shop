<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use App\Entity\Vinyl;
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
      $faker = Faker\Factory::create('fr_FR');
      //   $cat = new Categorie;
      //  $cat->setType("ROCK");
      for ( $i = 6;$i < 56;$i++ ){
        $vinyl = new Vinyl();
        $vinyl->setMp3("vinyl".$i);
        $vinyl->setTitle("titre du vinyl".$i);
        $vinyl->setArtiste($faker->name());
        $vinyl->setAnnee(mt_rand(1982,2022));
        $vinyl->setDescription("description du vinyl".$i);
        $vinyl->setPrice(14.99);
        $vinyl->setQte(mt_rand(1,20));
        $vinyl->setCreatedAt(new \DateTimeImmutable("now"));
       // $vinyl->addCategorie($cat);
        $manager->persist($vinyl);

      }
      
        $manager->flush();



       $i = 0;
        while($i<=20){
          
          $user = new User();
          $user->setFirstname($faker->firstname());
          $user->setLastname($faker->lastname());
          $user->setEmail($faker->email());
          $user->setRoles(["ROLE_USER"]);
          $user->setPassword($faker->password());
          $user->setTel($faker->phoneNumber());
          $user->setAdresse($faker->address());
         // $vinyl->addCategorie($cat);
          $manager->persist($user);





          $i++;
        }
        $manager->flush();





    }
}
