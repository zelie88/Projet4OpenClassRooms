<?php

namespace Projet4OpenClassRooms\src\controller;

use Projet4OpenClassRooms\src\DAO\ArticleDAO;
use Projet4OpenClassRooms\src\DAO\CommentDAO;
use Projet4OpenClassRooms\src\model\View;
use Projet4OpenClassRooms\config\Request;


abstract class Controller
{
    protected $articleDAO;
    protected $commentDAO;
    protected $view;
    private $request;
    protected $get;
    protected $post;
    protected $session;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}