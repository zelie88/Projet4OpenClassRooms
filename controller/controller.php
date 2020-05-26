<?php

require('model/PostManager.php');
require('model/CommentManager.php');

use \Projet4OpenClassRooms\Model\PostManager;
use \Projet4OpenClassRooms\Model\CommentManager;

function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();

        require('view/listPostsView.php');
    }

function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('view/postView.php');
    }

function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();

        $postedComment = $commentManager->postComment($postId, $author, $comment);
        if ($postedComment === false) {
            throw new Exception ('Impossible d\'ajouter le commentaire');
        }
        else {
            header('Location: index.php?action=post&id=' .$postId);
        }
    }
