<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Form\BookingType;
use App\Service\BookingHandler;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TechnoController extends AbstractController
{   
    /**
     * home
     * @Route("/", name="techno_home")
     * 
     * @return Response
     */
    public function home(): Response
    {
        return $this->render('techno/home.html.twig');
    }

    /**
     * book
     * @Route("/booking", name="techno_booking")
     * 
     * @param  mixed $request
     * @param  mixed $bookingHandler
     * @param  mixed $em
     * @return Response
     */
    public function book(Request $request, BookingHandler $bookingHandler, EntityManagerInterface $em): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('security_login');
        }

        $booking = new Booking($this->getUser());

        $form = $this->createForm(BookingType::class, $booking);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $bookingHandler->setConcerts($booking);

            $em->persist($booking);
            $em->flush();

            return $this->render('techno/home.html.twig');
        }

        return $this->render('techno/booking.html.twig', [
            'bookingForm' => $form->createView(),
        ]);
    }
}
