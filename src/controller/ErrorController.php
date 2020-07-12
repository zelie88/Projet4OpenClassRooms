<?php

namespace Projet4OpenClassRooms\src\controller;

class ErrorController
{
    public function erroNotFound()
    {
        require '../templates/error_404.php';
    }

    public function errorServer()
    {
        require '../templates/error_500.php';
    }
}