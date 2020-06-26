<?php

namespace Projet4OpenClassRooms\config;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([__CLASS__,'autoload']);
    }

    public static function autoload($class)
    {
        $class = str_replace('Projet4OpenClassRooms','', $class);
        $class = str_replace('\\','/',$class);
        require '../'.$class.'.php';

    }
}