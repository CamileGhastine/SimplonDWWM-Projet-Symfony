<?php

namespace App\Controller;

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
     */
    public function list(CategoryHandler $categoryHandler, ArtistRepository $artistRepository, CategoryRepository $categoryRepository): Response
    {  
        return $this->render('artist/list.html.twig', [
            'categories' => $categoryHandler->colorize($categoryRepository->findAll()),
            'artists' => $artistRepository->findAll(),
        ]);
    }
}
