<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categoryNames = ['Mélodique', 'Industrielle', 'Groovy', 'Deep', 'Détroit'];

        for ($i = 0; $i <= 4; $i++) {
            $category = new Category();
            $category->setName($categoryNames[$i]);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
