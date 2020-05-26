<?php

require('model.php');

function listPosts()
{
    $posts = getPosts();
    require('listPostsView.php');
}

function posts()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require('postView.php');
}