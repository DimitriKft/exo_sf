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

  

   
    // public function getApi(Request $request)
    // {
    //     $city_search    = $request->request->get('search_city', 'Toulouse');
    //     $response       = $this->client->request('GET',         'https://api.openweathermap.org/data/2.5/weather?q=' . $city_search .',fr&appid=' . $this->apiKey . '&units=metric');
    //     $status         = $response->getStatusCode();
    //     // dd($status);
    //     // die();
    //     $content        = $response->getContent();
    //     $content_decode = json_decode($content);
        
    //     return $content_decode;
    // }

    public function getApi(Request $request)
    {
      
        // if (200 !== $response->getStatusCode()) {
        //     throw new \Exception('blablbla');
        // }

        // catch(\Exception $e) 
        // {
        //     if (200 !== $response->getStatusCode()) {
        //         throw new \Exception('<h1>Blabla</h1>');
        //     }
        // }

        try
        {
            $city_search    = $request->request->get('search_city', 'Toulouse');
            $response       = $this->client->request('GET',         'https://api.openweathermap.org/data/2.5/weather?q=' . $city_search .',fr&appid=' . $this->apiKey . '&units=metric&lang=fr');
            $contentType    = $response->getHeaders()['content-type'][0];
            $content        = $response->getContent();
            
        }catch(\Exception $e) 
        {
            if (200 !== $response->getStatusCode()) 
            {
                header('Location: http://localhost:8000/error');
                die(); 
            }
        }
        
        $content_decode = json_decode($content);
        return $content_decode;
    }

    
}
