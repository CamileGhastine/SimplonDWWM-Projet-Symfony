<?php

namespace App\Service;


class ArtistHandler
{
    /**
     * @param array $artists
     * 
     */
    public function schedule(array $artists)
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

        foreach ($artists as $index => $artist) {
            $artist->setDate($concert[$index]['date']);
            $artist->setTime($concert[$index]['time']);
        }

        return $artists;
    }
}