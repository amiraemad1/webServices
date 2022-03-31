<?php

require_once "vendor\autoload.php";


use GuzzleHttp\Client;

class GruzzleWeather implements Weather_Interface
{
    public static function get_cities()
    {
        $str = file_get_contents(__DIR__ . '\..\resources\city.list.json');
        $json = json_decode($str, true);
        $cities = [];
        foreach ($json as $city) {
            if (strtolower($city['country']) === 'eg') {
                $cities[] = $city;
            }
        }
        return $cities;
    }

    public static function get_weather($lat, $lon)
    {
        $lat = $_GET['lat'];
        $lon = $_GET['lon'];
        try {
            $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=" . API_KEY;
            $client = new Client();
            $response = $client->get($url);
            return $response->getBody();
        } catch (Exception $exception) {
            return json_encode([
                'status' => 501,
                'message' => "Gateway Error"
            ]);
        }
    }
    public static function get_current_time()
    {
    
    }
}