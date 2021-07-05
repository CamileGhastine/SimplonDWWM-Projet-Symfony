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

        for ($i = 0; $i <= 4; $i++) {
            $category = new Category();
            $category->setName($categoryNames[$i]);
            $manager->persist($category);

            $this->addReference("category" . $i, $category);
        }

        $manager->flush();
    }
}
