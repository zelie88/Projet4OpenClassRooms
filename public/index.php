<?php

require '../config/dev.php';
require '../config/Autoloader.php';
use \Projet4OpenClassRooms\config\Autoloader;
Autoloader::register();

$router = new \Projet4OpenClassRooms\config\Router();
$router->run();