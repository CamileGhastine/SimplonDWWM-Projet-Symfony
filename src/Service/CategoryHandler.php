<?php

namespace App\Service;


class CategoryHandler
{
    public function colorize(array $categories)
    {
        $categoryColors = [
            'Mélodique' => 'primary',
            'Industrielle' => 'secondary',
            'Groovy' => 'success',
            'Deep' => 'info',
            'Détroit'=> 'warning'
        ];

        foreach ($categories as $category) {
            $category->setColor($categoryColors[$category->getName()]);
        }

        return $categories;
    }
}