<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class WeatherService
{
    private $client;
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->client = HttpClient::create();
        $this->apiKey = $apiKey;
    }

    /**
     * @return array
     */
    public function getWeather()
    {
        /* API call for Bordeaux weather conditions*/

        $response_bordeaux = $this->client->request('GET', 'https://api.openweathermap.org/data/2.5/weather?lon=-0.58&lat=44.84&appid=' . $this->apiKey);
        $bordeaux_weather_data = json_decode($response_bordeaux->getContent(), true);

        /* conversion of wind speed from m/s to km/h */
        $bordeaux_wind = round(($bordeaux_weather_data['wind']['speed'] * 3.6), 1, PHP_ROUND_HALF_UP);

        /* conversion of temperature from Kelvin to Celsius degrees */
        $bordeaux_temperature = round(($bordeaux_weather_data['main']['temp'] - 273.15), 1, PHP_ROUND_HALF_UP);

        /* API call for Toulouse weather conditions*/

        $response_toulouse = $this->client->request('GET', 'https://api.openweathermap.org/data/2.5/weather?lon=1.44&lat=43.6&appid=' . $this->apiKey);
        $toulouse_weather_data = json_decode($response_toulouse->getContent(), true);

        /* conversion of wind speed from m/s to km/h */
        $toulouse_wind = round(($toulouse_weather_data['wind']['speed'] * 3.6), 1, PHP_ROUND_HALF_UP);

        /* conversion of temperature from Kelvin to Celsius degrees */
        $toulouse_temperature = round(($toulouse_weather_data['main']['temp'] - 273.15), 1, PHP_ROUND_HALF_UP);

        return [
            'bordeaux_temperature' => $bordeaux_temperature,
            'bordeaux_wind' => $bordeaux_wind,
            'toulouse_temperature' => $toulouse_temperature,
            'toulouse_wind' => $toulouse_wind,
        ];
    }
}
