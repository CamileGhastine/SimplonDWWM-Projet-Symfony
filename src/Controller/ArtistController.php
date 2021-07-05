<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Entity\Category;
use App\Service\CategoryHandler;
use App\Repository\ArtistRepository;
use App\Repository\CategoryRepository;
use App\Service\ArtistHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    /**
     * @Route("/artist/{id<[0-9]+>}", name="artist_show")
     */
    public function show(Artist $artist): Response
    {
        return $this->render('artist/show.html.twig', [
            'artist' => $artist
        ]);
    }

    /**
     * @Route("/schedule", name="artist_schedule")
     */
    public function schedule(ArtistRepository $artistRepository, ArtistHandler $artistHandler): Response
    {
        $artists = $artistRepository->findArtistInConcert();
        $artists = $artistHandler->schedule($artists);

        return $this->render('artist/schedule.html.twig', [
            'artists' => $artists,
        ]);
    }
}
