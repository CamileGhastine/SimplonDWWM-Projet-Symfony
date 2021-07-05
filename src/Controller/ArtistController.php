<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Entity\Category;
use App\Service\CategoryHandler;
use App\Repository\ArtistRepository;
use App\Repository\CategoryRepository;
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
    public function schedule(ArtistRepository $artistRepository): Response
    {
        $concert = [
            0 => ['date' => '20/08/2021' , 'time' => '16h-18h'],
            1 => ['date' => '20/08/2021' , 'time' => '18h-20h'],
            2 => ['date' => '20/08/2021' , 'time' => '21h-23h'],
            3 => ['date' => '21/08/2021' , 'time' => '16h-18h'],
            4 => ['date' => '21/08/2021' , 'time' => '18h-20h'],
            5 => ['date' => '21/08/2021' , 'time' => '21h-23h'],
            6 => ['date' => '22/08/2021' , 'time' => '16h-18h'],
            7 => ['date' => '22/08/2021' , 'time' => '18h-20h'],
            8 => ['date' => '22/08/2021' , 'time' => '21h-23h'],
        ];

        $artists = $artistRepository->findArtistInConcert();
      
        foreach ($artists as $index => $artist) {
            $artist->date = $concert[$index]['date'];
            $artist->time = $concert[$index]['time'];
        }
        return $this->render('artist/schedule.html.twig', [
            'artists' => $artists,
        ]);
    }
}
