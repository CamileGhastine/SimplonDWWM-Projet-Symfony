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
        $categories = $categoryRepository->findAll();
        $artists = $artistRepository->findAll();

        return $this->render('artist/list.html.twig', [
            'categories' => $categories,
            'artists' => $artists,
        ]);
    }
}
