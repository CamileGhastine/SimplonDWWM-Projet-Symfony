<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TechnoController extends AbstractController
{
    /**
     * @Route("/", name="techno_home")
     */
    public function home(): Response
    {
        return $this->render('techno/home.html.twig');
    }

    /**
     * @Route("/book", name="techno_book")
     */
    public function book(): Response
    {
        return $this->render('techno/home.html.twig');
    }
}
