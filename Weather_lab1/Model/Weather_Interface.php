<?php
interface Weather_Interface {
    public static function get_cities();
    public static function get_weather($lat, $lon);
    public static function get_current_time();
}