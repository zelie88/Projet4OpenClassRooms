<?php

namespace Projet4OpenClassRooms\src\controller;

use Projet4OpenClassRooms\config\Parameter;

class BackController extends Controller
{
    public function administration()
    {
        $articles = $this->articleDAO->getArticles();
        $comments = $this->commentDAO->getFlagComments();
        return $this->view->render('administration', [
            'articles' => $articles,
            'comments' =>$comments
        ]);
    }

    public function addArticle(Parameter $post)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Article');
            if(!$errors) {
                $this->articleDAO->addArticle($post);
                $this->session->set('add_article','Article ajouté!');
                header('Location: ../public/index.php?action=administration');
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
                header('Location: ../public/index.php?action=administration');
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
        $this->session->set('delete_article', 'Article supprimé!');
        header('Location: ../public/index.php?action=administration');
    }

    public function unflagComment($commentId)
    {
        $this->commentDAO->unflagComment($commentId);
        $this->session->set('unflag_comment', 'Commentaire validé!');
        header('Location: ../public/index.php?action=administration');
    }

    public function deleteComment($commentId)
    {
        $this->commentDAO->deleteComment($commentId);
        $this->session->set('delete_comment', 'Commentaire supprimé!');
        header('Location: ../public/index.php?action=administration');
    }

    public function profile()
    {
        return $this->view->render('profile');
    }

    public function updatePassword(Parameter $post)
    {
        if($post->get('submit')) {
            $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
            $this->session->set('update_password', 'Mot de passe modifié!');
            header('Location: ../public/index.php?action=profile');
        }
        return $this->view->render('update_password');
    }

    public function logout()
    {
        $this->session->stop();
        $this->session->start();
        $this->session->set('logout', 'À bientôt');
        header('Location: ../public/index.php');
    }
}