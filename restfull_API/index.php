<?php

session_start();

require_once("vendor/autoload.php");

$db = new MySQLHandler();
$db->connect();


$api = new MyAPI($db);