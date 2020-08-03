<?php

namespace Projet4OpenClassRooms\config;

use Projet4OpenClassRooms\src\controller\BackController;
use Projet4OpenClassRooms\src\controller\FrontController;
use Projet4OpenClassRooms\src\controller\ErrorController;

use Exception;

class Router
{
    private $frontController;
    private $backController;
    private $errorController;
    private $request;

    public function __construct()
    {
        $this->frontController = new FrontController();
        $this->errorController = new ErrorController();
        $this->backController = new BackController();
        $this->request = new Request();
    }

    public function run()
    {
        $action = $this->request->getGet()->get('action');
        try {
            if (isset($action))
            {
                switch ($action)
                {
                case 'article':
                    $this->frontController->article($this->request->getGet()->get('articleId'));
                    break;
                
                case 'addArticle': 
                    $this->backController->addArticle($this->request->getPost());
                    break;
                
                case 'editArticle':
                    $this->backController->editArticle($this->request->getPost(), $this->request->getGet()->get('articleId'));
                    break;

                case 'deleteArticle':
                    $this->backController->deleteArticle($this->request->getGet()->get('articleId'));
                    break;

                case 'addComment':
                    $this->frontController->addComment($this->request->getPost(), $this->request->getGet()->get('articleId'));
                    break;

                case 'flagComment':
                    $this->frontController->flagComment($this->request->getGet()->get('commentId'));
                    break;

                case 'unflagComment':
                    $this->backController->unflagComment($this->request->getGet()->get('commentId'));
                    break;

                case 'deleteComment':
                    $this->backController->deleteComment($this->request->getGet()->get('commentId'));
                    break;

                case 'register':
                    $this->frontController->register($this->request->getPost());
                    break;

                case'login':
                    $this->frontController->login($this->request->getPost());
                    break;

                case 'profile':
                    $this->backController->profile();
                    break;
                
                case 'updatePassword':
                    $this->backController->updatePassword($this->request->getPost());
                    break;

                case 'logout':
                    $this->backController->logout();
                    break;

                case 'administration':
                    $this->backController->administration();
                    break;

                default:
                    $this->errorController->errorNotFound();
                    break;
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