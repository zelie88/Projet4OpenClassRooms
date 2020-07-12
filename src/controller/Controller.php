<?php

namespace Projet4OpenClassRooms\src\controller;

use Projet4OpenClassRooms\src\DAO\ArticleDAO;
use Projet4OpenClassRooms\src\DAO\CommentDAO;
use Projet4OpenClassRooms\src\model\View;

abstract class Controller
{
    protected $articleDAO;
    protected $commentDAO;
    protected $view;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
    }
}