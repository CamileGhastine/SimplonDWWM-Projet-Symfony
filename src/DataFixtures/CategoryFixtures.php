<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $categoryNames = ['Mélodique', 'Industrielle', 'Groovy', 'Deep', 'Détroit'];
        $concert = 1;

        for ($i = 0; $i <= 4; $i++) {
            $category = new Category();
            $category->setName($categoryNames[$i]);
            $manager->persist($category);

            for ($j = 0; $j < rand(3, 8); $j++) {

                $artist = new Artist();
                $artist->setName($faker->firstname())
                    ->setDescription($faker->paragraphs(10, true))
                    ->setCategory($category);
                if ($concert <= 9 && rand(0, 5) <=2) {
                    $artist->setConcert($concert);
                    $concert++;
                }


                $manager->persist($artist);
            }
        }

        $manager->flush();
    }
}
