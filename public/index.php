<?php

require '../config/dev.php';
require '../config/Autoloader.php';
use \Projet4OpenClassRooms\config\Autoloader;
Autoloader::register();

session_start();

$router = new \Projet4OpenClassRooms\config\Router();
$router->run();