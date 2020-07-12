<?php

namespace Projet4OpenClassRooms\src\controller;

class FrontController extends Controller
{
    public function home()
    {
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('home',
        [
            'articles' => $articles
        ]);
    }

    public function article($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        $comments = $this->commentDAO->getComments($articleId);
        return $this->view->render('single',
        [
            'article' => $article,
            'comments' => $comments
        ]);
    }
}