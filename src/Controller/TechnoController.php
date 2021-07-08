<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Form\BookingType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
     * @Route("/booking", name="techno_booking")
     */
    public function book(Request $request, EntityManagerInterface $em): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('security_login');
        }

        $booking = new Booking($this->getUser());
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

            $concert = [];
            for ($i = 1; $i <= 9; $i++) {
                $getConcert = 'getConcert' . $i;
                $concert['Concert ' . $i] = $data->$getConcert();
            }
            $booking->setConcert($concert);

            $em->persist($booking);
            $em->flush();

            return $this->render('techno/home.html.twig');
        }

        return $this->render('techno/booking.html.twig', [
            'bookingForm' => $form->createView(),
        ]);
    }
}
