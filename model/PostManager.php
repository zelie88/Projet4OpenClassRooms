<?php
require 'model/Manager.php';

class PostManager extends Manager
{
    public function getArticles()
    {
        $connection = $this->getConnection();
        $response = $connection->query('SELECT id, title, content, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate FROM articles ORDER BY creationDate DESC LIMIT 0, 5');

        return $response;
    }

    public function getArticle($articleId)
    {
        $connection = $this->getConnection();
        $response = $connection->prepare('SELECT id, title, content, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate FROM articles WHERE id=?');
        $response->execute([$articleId]);
        $article = $response->fetch();

        return $article;
    }
}