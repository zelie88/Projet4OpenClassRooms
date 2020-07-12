<?php

namespace Projet4OpenClassRooms\src\controller;

use Projet4OpenClassRooms\config\Parameter;

class BackController extends Controller
{
    public function addArticle(Parameter $post)
    {
        if($post->get('submit')) {
            $this->articleDAO->addArticle($post);
            $this->session->set('add_article','Article ajouté!');
            header('Location: ../public/index.php');
        }
        return $this->view->render('add_article',
        [
            'post'=>$post
        ]);
    }

    public function editArticle(Parameter $post, $articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        if($post->get('submit')) {
            $this->articleDAO->editArticle($post, $articleId);
            $this->session->set('edit_article','Article modifié!');
            header('Location: ../public/index.php');
        }
        
        return $this->view->render('edit_article',
        [
            'article' => $article
        ]);
    }
}