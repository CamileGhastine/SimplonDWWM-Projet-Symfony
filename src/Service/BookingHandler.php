<?php

namespace App\Service;

use App\Entity\Booking;
use App\Entity\User;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;

class BookingHandler
{
    /**
     * @param Booking $booking
     * @param Form $form
     */
    public function setConcerts(Booking $booking, Form $form)
    {
        $concert = [];
        $numberTicket = 0;

        for ($i = 1; $i <= 9; $i++) {
            $getConcert = 'getConcert' . $i;
            
            $concert['Concert ' . $i] = $booking->$getConcert();
            $numberTicket += $booking->$getConcert();
        }

        $booking->setConcert($concert);

        if (!$numberTicket) $form->addError(new FormError('Vous n\'avez réservé aucune place.'));
    }


    public function instanciate(User $user, Request $request)
    {
        $booking = new Booking($user);

        if($request->query->count()) {
            $concert = 'setConcert' . $request->query->get('concert');
            $booking->$concert(2);
        }

        return $booking ;
    }
}