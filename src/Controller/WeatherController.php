<?php

namespace App\Controller;

use App\Service\WeatherService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Encoder\DecoderInterface;


class WeatherController extends AbstractController
{
    private $wheatherService;

    public function __construct(WeatherService $weather)
    {
        $this->weatherService = $weather;
    }



    /**
     * @Route("/", name="weather")
     */
    public function index(WeatherService $weather, Request $request, DecoderInterface $decode)
    {
        $api = $weather->getApi( $request);
        $date = date("d/m/Y");
        return $this->render('weather/index.html.twig',[ 
            'api' => $api,
            'date' => $date
        ]);
    }

        /**
     * @Route("/error", name="weathErerror")
     */
    public function error(WeatherService $weather, Request $request, DecoderInterface $decode)
    {
        $api = $weather->getApi( $request);
        $date = date("Y/m/d");
        return $this->render('weather/error.html.twig',[ 
            'api' => 'test',
    
        ]);
    }

    
   
    
}
