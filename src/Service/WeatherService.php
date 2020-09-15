<?php

namespace App\Service;


use Symfony\Component\HttpFoundation\Request;
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

  

   
    public function getApi(Request $request)
    {
        $city_search    = $request->request->get('search_city', 'Toulouse');
        $response       = $this->client->request('GET',         'https://api.openweathermap.org/data/2.5/weather?q=' . $city_search .',fr&appid=' . $this->apiKey . '&units=metric');
        $contentType    = $response->getHeaders()['content-type'][0];
        $content        = $response->getContent();
        $content_decode = json_decode($content);
        
        return $content_decode;
    }
}
