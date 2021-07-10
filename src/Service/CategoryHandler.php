<?php

namespace App\Service;


class CategoryHandler
{
    /**
     * @param array $categories
     */
    public function colorize(array $categories)
    {
        $categoryColors = [
            'Mélodique' => 'primary',
            'Industrielle' => 'secondary',
            'Groovy' => 'success',
            'Deep' => 'info',
            'Détroit' => 'warning'
        ];

        foreach ($categories as $category) {
            $category->setColor($categoryColors[$category->getName()]);
        }

        return $categories;
    }
}
