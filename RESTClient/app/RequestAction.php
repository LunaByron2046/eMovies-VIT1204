<?php
require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;

class RequestAction
{
    private $client;
    private $view;
    
    private $baseUrl = "http://localhost/RESTServer816838";

    public function __construct()
    {
        $this->client = new Client([
            'timeout' => 10.0
        ]);
    }
     public function index()
    {
        return null;
    }

    
    public function viewGames()
    {
        $url = $this->baseUrl . "/games";
        $response = $this->client->get($url);
        return json_decode($response->getBody()->getContents(), true);
    }

    
    public function searchGames($keyword)
    {
        
        $safeKw = urlencode($keyword);
        $url = $this->baseUrl . "/games/search/" . $safeKw;
        
        $response = $this->client->get($url);
        return json_decode($response->getBody()->getContents(), true);
    }

    
    public function addGame($data)
    {
        $url = $this->baseUrl . "/games";
        $response = $this->client->post($url, [
            'form_params' => $data
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}