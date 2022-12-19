<?php
namespace App\Service;

class Meteo
{
public function getTemp(): string
{
    /*
    $data = file_get_contents('https://api.meteo-concept.com/api/forecast/daily/0?token=68874e7171a98129f5640d2550f8783c345c97c7206509f2899a90f4ba7ed10c&insee=35238');

    if ($data !== false) {
        $decoded = json_decode($data);
        $city = $decoded->city;
        $forecast = $decoded->forecast;

        $meteo = $forecast->tmax;
    }
    */

    $meteo = -2;

return $meteo;
}
}