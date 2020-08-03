<?php

namespace Projet4OpenClassRooms\src\controller;

use Projet4OpenClassRooms\config\Parameter;

class BackController extends Controller
{
    private function checkLoggedIn()
    {
        if(!$this->session->get('pseudo')) {
            $this->session->set('need_login', 'Vous devez vous connecter pour accéder à cette page');
            header('Location: ../public/index.php?action=login');
        } else {
            return true;
        }
    }

    public function administration()
    {
        if($this->checkLoggedIn()) {
            $articles = $this->articleDAO->getArticles();
            $comments = $this->commentDAO->getFlagComments();
            return $this->view->render('administration', [
                'articles' => $articles,
                'comments' =>$comments
            ]);
        }
    }

    public function addArticle(Parameter $post)
    {
        if($this->checkLoggedIn()) {
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
    }

    public function editArticle(Parameter $post, $articleId)
    {
        if($this->checkLoggedIn()) {
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
    }

    public function deleteArticle($articleId)
    {
        if($this->checkLoggedIn()) {
            $this->articleDAO->deleteArticle($articleId);
            $this->session->set('delete_article', 'Article supprimé!');
            header('Location: ../public/index.php?action=administration');
        }
    }

    public function unflagComment($commentId)
    {
        if($this->checkLoggedIn()) {
            $this->commentDAO->unflagComment($commentId);
            $this->session->set('unflag_comment', 'Commentaire validé!');
            header('Location: ../public/index.php?action=administration');
        }
    }

    public function deleteComment($commentId)
    {
        if($this->checkLoggedIn()) {
            $this->commentDAO->deleteComment($commentId);
            $this->session->set('delete_comment', 'Commentaire supprimé!');
            header('Location: ../public/index.php');
        }
    }

    public function profile()
    {
        if($this->checkLoggedIn()) {
            return $this->view->render('profile');
        }
    }

    public function updatePassword(Parameter $post)
    {
        if($this->checkLoggedIn()) {
            if($post->get('submit')) {
            $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
            $this->session->set('update_password', 'Mot de passe modifié!');
            header('Location: ../public/index.php?action=profile');
            }
                return $this->view->render('update_password');
        }
    }

    public function logout()
    {
        if($this->checkLoggedIn()) {
            $this->session->stop();
            $this->session->start();
            $this->session->set('logout', 'À bientôt');
            header('Location: ../public/index.php');
        }
    }
}