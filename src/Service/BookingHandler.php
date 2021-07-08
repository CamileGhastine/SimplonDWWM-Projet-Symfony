<?php

namespace App\Service;

use App\Entity\Booking;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormError;

class BookingHandler
{
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
}