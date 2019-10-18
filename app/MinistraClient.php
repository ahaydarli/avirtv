<?php
namespace App;


use GuzzleHttp\Client;

class MinistraClient
{
    public $client;


    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://ministra.avirtel.az/stalker_portal/api/',
            'timeout' => '5.0'
        ]);
    }

    public function getData($uri)
    {
        $data = $this->client->get($uri)->getBody();
        return json_decode($data);
    }

    public function postData($uri, $payload)
    {
        $data = $this->client->post($uri, [
            'form_params' => $payload
        ])->getBody();
        return json_decode($data);
    }


}


