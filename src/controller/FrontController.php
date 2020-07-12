<?php

namespace Projet4OpenClassRooms\src\controller;

use Projet4OpenClassRooms\src\DAO\ArticleDAO;
use Projet4OpenClassRooms\src\DAO\CommentDAO;

class FrontController
{
    private $articleDAO;
    private $commentDAO;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
    }

    public function home()
    {
        $articles = $this->articleDAO->getArticles();
        require '../templates/home.php';
    }

    public function article($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        $comments = $this->commentDAO->getComments($articleId);
        require '../templates/single.php';
    }
}