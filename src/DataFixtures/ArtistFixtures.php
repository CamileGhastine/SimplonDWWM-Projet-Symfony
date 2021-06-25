<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArtistFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 9; $i++) {
            $artist = new Artist();

            $artist->setName('DJ artiste'.$i)
                ->setDescription('une description super cool');

            $manager->persist($artist);
        }

        $manager->flush();
    }
}
