<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Artist;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArtistFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $concert = 1;

        for ($j = 0; $j < 20; $j++) {

            $artist = new Artist();
            $artist->setName($faker->firstname())
                ->setDescription($faker->paragraphs(10, true));
            if (rand(0, 5) > 1) {
                $artist->setCategory($this->getReference("category" . rand(0, 4)));
            }
            if ($concert <= 9 && rand(0, 5) <= 2) {
                $artist->setConcert($concert);
                $concert++;
            }

            $manager->persist($artist);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
