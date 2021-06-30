<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\ArtistRepository;
use App\Repository\CategoryRepository;
use App\Service\CategoryHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    /**
     * @Route("/artist", name="artist_list")
     * @Route("/artist/category/{id}", name="artist_listByCategory")
     */
    public function list(Category $category = null, CategoryHandler $categoryHandler, ArtistRepository $artistRepository, CategoryRepository $categoryRepository): Response
    {

        $artists = !$category ?
            $artistRepository->findAll() :
            $category->getArtists();

        return $this->render('artist/list.html.twig', [
            'categories' => $categoryHandler->colorize($categoryRepository->findAll()),
            'artists' => $artists
        ]);
    }
}
