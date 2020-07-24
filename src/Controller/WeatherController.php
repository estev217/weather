<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\WeatherService;
use Symfony\Component\Validator\Constraints\DateTime;

class WeatherController extends AbstractController
{
    private $weatherService;

    public function __construct(WeatherService $weather)
    {
        $this->weatherService = $weather;
    }

    /**
     * @Route("/", name="weather")
     * @param WeatherService $weatherService
     */
    public function index(WeatherService $weatherService)
    {
        $weather = $weatherService->getWeather();

        $date = date("H:i:s");

        return $this->render('weather/index.html.twig', array(
            'weather' => $weather,
            'date' => $date,
        ));
    }
}
