<?php 

//require_once "";


# Archivo Número 1 Principal 

class ApiFetcher {

        protected $client;

        public function __construct()          #
        {
        $this->client = $client;
        }

        public function get($url)     
        {
            return json_decode($this->client->request('GET', $url)->getBody());
        }

        public function getArray($url)
        {
            return json_decode($this->client->request('GET', $url)->getBody(), true);
        }

    }


?>