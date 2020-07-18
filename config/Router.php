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
            if(isset($action))
            {
                if($action === 'article') {
                    $this->frontController->article($this->request->getGet()->get('articleId'));
                }
                elseif($action === 'addArticle') {
                    $this->backController->addArticle($this->request->getPost());
                }
                elseif($action === 'editArticle') {
                    $this->backController->editArticle($this->request->getPost(), $this->request->getGet()->get('articleId'));
                }
                elseif($action === 'deleteArticle') {
                    $this->backController->deleteArticle($this->request->getGet()->get('articleId'));
                }
                elseif($action === 'addComment') {
                    $this->frontController->addComment($this->request->getPost(), $this->request->getGet()->get('articleId'));
                }
                elseif($action === 'flagComment'){
                    $this->frontController->flagComment($this->request->getGet()->get('commentId'));
                }
                elseif($action === 'deleteComment'){
                    $this->backController->deleteComment($this->request->getGet()->get('commentId'));
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