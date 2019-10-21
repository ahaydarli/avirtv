<?php
namespace App;


use GuzzleHttp\Client;

class MinistraClient
{
    public $client;
    const API_URL = 'http://ministra.avirtel.az/stalker_portal/api/';

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::API_URL,
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

    public function createUser($payload)
    {
        return True;
    }
}


