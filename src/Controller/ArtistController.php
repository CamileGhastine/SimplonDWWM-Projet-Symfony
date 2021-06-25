<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    /**
     * @Route("/artist", name="artist_list")
     */
    public function list(CategoryRepository $categoryRepository): Response
    {
        // $categories = ['Mélodique', 'Industrielle', 'Groovy', 'Deep', 'Détroit'];
        $categories = $categoryRepository->findAll();

        return $this->render('artist/list.html.twig', [
            'categories' => $categories
        ]);
    }
}
