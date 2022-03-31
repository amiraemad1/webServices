<?php
const API_KEY = 'f90554da3b5a5fad1e0edad371035dcb';
class Weather implements Weather_Interface
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
            $curl = curl_init("https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=" . API_KEY);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            return curl_exec($curl);
        } catch (Exception $exception) {
            return json_encode([
                'status' => 501,
                'message' => "Gateway Error"
            ]);
        }
    }
    public static function get_current_time()
    {
        // TODO: Implement get_current_time() method.
    }
}