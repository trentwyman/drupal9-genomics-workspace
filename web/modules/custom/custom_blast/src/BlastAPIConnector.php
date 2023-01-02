<?php

use Drupal\custom_blast\Form\BlastAPI;

namespace Drupal\custom_blast;

class BlastAPIConnector {

    private $client;
    private $api_url;

    public function __construct()
    {
        $blast_api_config = \Drupal::state()->get(
            \Drupal\custom_blast\Form\BlastAPI::BLAST_API_CONFIG_PAGE
        );
        $this->api_url = isset($blast_api_config['api_base_url'])?$blast_api_config['api_base_url']:"http://i5k-api:8000";
        $this->client = new \GuzzleHttp\Client();
        
    }

    public function get_hmmer_databases(){
        $data = [];
        $endpoint = '/v1/hmmer/';
        try{
            
            $request = $this->client->request('GET', $this->api_url.$endpoint, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-type' => 'application/json'
                ]]);
            $result = $request->getBody()->getContents();
            $data = json_decode($result);
        }
        catch(\GuzzleHttp\Exception\RequestException $e){
            \Drupal::logger('Blast API'); //later: try to use watchdog_exception here!
        }
        return $data;
    }

    public function get_blast_databases(){
        $data = [];
        $endpoint = '/v1/blast/';
        try{
            
            $request = $this->client->request('GET', $this->api_url.$endpoint, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-type' => 'application/json'
                ]]);
            $result = $request->getBody()->getContents();
            $data = json_decode($result);
        }
        catch(\GuzzleHttp\Exception\RequestException $e){
            \Drupal::logger('Blast API'); //later: try to use watchdog_exception here!
        }
        return $data;
    }
}