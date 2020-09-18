<?php

namespace App\Service;


use redirect;

use PhpParser\Node\Stmt\Echo_;
use Symfony\Component\Routing\Route;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class WeatherService
{
    private $client;
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->client = HttpClient::create();
        $this->apiKey = $apiKey;
    }


    public function getApi(Request $request)
    {
        try
        {
            $city_search    = $request->request->get('search_city', 'Toulouse');
            $response       = $this->client->request('GET', 'https://api.openweathermap.org/data/2.5/weather?q=' . $city_search .'&appid=' . $this->apiKey . '&units=metric&lang=fr');
            $content        = $response->getContent();
            
        }
        catch(\Exception $e) 
        {
            if (200 !== $response->getStatusCode()) 
            {
                header("Location: {$_SERVER['HTTP_REFERER']}");
                die(); 
            }
        }
        
        $content_decode = json_decode($content);
        return $content_decode;
    }

    
}
