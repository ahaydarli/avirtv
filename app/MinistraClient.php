<?php
namespace App;


use GuzzleHttp\Client;

class MinistraClient
{
    public $client;


    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://127.0.0.1:5050/ministra/api/',
            'timeout' => '2.0'
        ]);
    }

    public function getData($uri)
    {
        $data = $this->client->get($uri)->getBody();
        return json_decode($data);
    }

}


