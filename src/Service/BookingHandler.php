<?php

namespace App\Service;

use App\Entity\Booking;

class BookingHandler
{
    public function setConcerts(Booking $booking)
    {
        $concert = [];

        for ($i = 1; $i <= 9; $i++) {
            $getConcert = 'getConcert' . $i;
            $concert['Concert ' . $i] = $booking->$getConcert();
        }

        $booking->setConcert($concert);
    }
}