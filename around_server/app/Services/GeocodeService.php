<?php


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;


class GeocodeService
{

    public function __construct() {
    }

    public function wordSearch($search_word) {
        $http_client = new Client();
        $url = 'https://maps.googleapis.com/maps/api/geocode/json';
        $api_key = 'AIzaSyCD9iln7jkIDOHkOKPbu-dF2R3pRZK5gws';
        /*
         Geocoding (latitude/longitude lookup)
         住所から緯度経度を取得
         */
        try {
            $response = $http_client->request('GET', $url, [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'query' => [
                    'key' => $api_key,
                    'language' => 'ja',
                    'address' => $search_word,
                ],
                'verify' => false,
            ]);
        } catch (ClientException $e) {
            throw $e;
        }

        $body = $response->getBody();
        echo $body . PHP_EOL;
        $json = json_decode($body);
        echo $json->results[0]->formatted_address;
        return $result;
    }


    public function addNoticeData1($input_data) {
        /*
         Reverse geocoding (address lookup)
         緯度経度から住所を取得
         */
        $latitude = $input_data['latitude'];//'35.7799638';
        $longitude = $input_data['longitude'];//'139.723053';
        $latlng = $latitude . ',' . $longitude;

        try {
            $response = $http_client->request('GET', $url, [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'query' => [
                    'key' => $api_key,
                    'language' => 'ja',
                    'latlng' => $latlng,
                ],
                'verify' => false,
            ]);
        } catch (ClientException $e) {
            throw $e;
        }
        $body = $response->getBody();
        $json = json_decode($body);
        echo $json->results[0]->formatted_address;
    }


}