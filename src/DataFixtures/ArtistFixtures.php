<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ArtistFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 1; $i < 4; $i++) {
            $artist = new Artist();

            $artist->setName('DJ ' . $faker->firstname())
                ->setDescription($faker->paragraphs(10, true))
                ;

            $manager->persist($artist);
        }

        $manager->flush();
    }
}
