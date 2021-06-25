<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    /**
     * @Route("/artist", name="artist_list")
     */
    public function list(CategoryRepository $categoryRepository, ArtistRepository $artistRepository): Response
    {
        $categoryColors = [
            'Mélodique' => 'primary',
            'Industrielle' => 'secondary',
            'Groovy' => 'success',
            'Deep' => 'info',
            'Détroit'=> 'warning'
        ];

        $categories = $categoryRepository->findAll();

        foreach ($categories as $category) {
            $category->setColor($categoryColors[$category->getName()]);
        }

        $artists = $artistRepository->findAll();

        foreach ($artists as $artist) {
            $categoryName = $artist->getCategory() ? $artist->getCategory()->getName() : null;
            $color = $categoryName ? $categoryColors[$categoryName] : 'dark';
            $artist->setColor($color);
        }

        return $this->render('artist/list.html.twig', [
            'categories' => $categories,
            'artists' => $artists,
        ]);
    }
}
