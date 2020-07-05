<?php

namespace Projet4OpenClassRooms\config;

use Projet4OpenClassRooms\src\controller\FrontController;

use Exception;

class Router
{
    private $frontController;

    public function __construct()
    {
        $this->frontController = new FrontController();
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
                    echo 'Page inconnue!';
                }
            }
        
            else {
                $this->frontController->home();
            }
        }
        
        catch (Exception $e)
        {
            echo 'Erreur';
        }
    }
}