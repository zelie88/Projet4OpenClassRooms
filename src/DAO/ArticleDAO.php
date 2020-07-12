<?php

namespace Projet4OpenClassRooms\src\DAO;

use Projet4OpenClassRooms\config\Parameter;
use Projet4OpenClassRooms\src\model\Article;

class ArticleDAO extends DAO
{
    private function buildObject($row)
    {
        $article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setCreationDate($row['creationDate']);
        return $article;
    }

    public function getArticles()
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creationDate FROM articles ORDER BY id DESC';
        $result = $this->createQuery($sql);
        $articles = [];
        foreach ($result as $row)
            {
                $articleId = $row['id'];
                $articles[$articleId] = $this->buildObject($row);
            }
        $result->closeCursor();
        return $articles;
    }

    public function getArticle($articleId)
    {
        $sql = 'SELECT id, title, content, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creationDate FROM articles WHERE id=?';
        $result = $this->createQUery($sql,[$articleId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($article);
    }

    public function addArticle(Parameter $post)
    {
        $sql = 'INSERT INTO articles (title, content, creationDate) VALUES (?, ?, CURDATE())';
        $this->createQuery($sql, [
            $post->get('title'),
            $post->get('content')
        ]);
    }

    public function editArticle(Parameter $post, $articleId)
    {
        $sql = 'UPDATE articles SET title=:title, content=:content WHERE id=:articleId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'content' => $post->get('content'),
            'articleId' => $articleId
        ]);
    }

}