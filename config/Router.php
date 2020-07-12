<?php

namespace Projet4OpenClassRooms\config;

use Projet4OpenClassRooms\src\controller\FrontController;
use Projet4OpenClassRooms\src\controller\ErrorController;

use Exception;

class Router
{
    private $frontController;
    private $errorController;

    public function __construct()
    {
        $this->frontController = new FrontController();
        $this->errorController = new ErrorController();

    }

    public function run()
    {
        try {
            if(isset($_GET['action']))
            {
                if($_GET['action'] === 'article') {
                    $this->frontController->article($_GET['articleId']);
                }
                else {
                    $this->errorController->errorNotFound();
                }
            }
        
            else {
                $this->frontController->home();
            }
        }
        
        catch (Exception $e)
        {
            $this->errorController->errorServer();
        }
    }
}