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
        return $this->render('weather/index.html.twig',[ 
            'api' => $api,
        ]);
    }

        /**
     * @Route("/error", name="weathErerror")
     */
    public function error(WeatherService $weather, Request $request, DecoderInterface $decode)
    {
        $api = $weather->getApi( $request);
        return $this->render('weather/error.html.twig',[ 
            'api' => 'test'
        ]);
    }

    
   
    
}
