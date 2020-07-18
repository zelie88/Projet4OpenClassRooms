<?php

namespace Projet4OpenClassRooms\src\controller;

use Projet4OpenClassRooms\config\Parameter;

class BackController extends Controller
{
    public function addArticle(Parameter $post)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Article');
            if(!$errors) {
                $this->articleDAO->addArticle($post);
                $this->session->set('add_article','Article ajouté!');
                header('Location: ../public/index.php');
            }
            return $this->view->render('add_article',
                [
                'post' => $post,
                'errors' => $errors
                ]);
        }
        return $this->view->render('add_article');
    }

    public function editArticle(Parameter $post, $articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Article');
            if(!$errors) {
                $this->articleDAO->editArticle($post, $articleId);
                $this->session->set('edit_article','Article modifié!');
                header('Location: ../public/index.php');
            }
            return $this->view->render('edit_article',
            [
                'post' => $post,
                'errors' => $errors
            ]);
        }

        $post->set('id', $article->getId());
        $post->set('title', $article->getTitle());
        $post->set('content', $article->getContent());

        return $this->view->render('edit_article',
        [
            'post' => $post
        ]);
    }

    public function deleteArticle($articleId)
    {
        $this->articleDAO->deleteArticle($articleId);
        $this->session->set('delete Article', 'Article supprimé');
        header('Location: ../public/index.php');
    }
}