<?php

namespace Projet4OpenClassRooms\src\DAO;

class ArticleDAO extends DAO
{
    public function getArticles()
    {
        $sql = 'SELECT id, title, content, creationDate FROM articles ORDER BY id DESC';
        return $this->createQuery($sql);
    }

    public function getArticle($articleId)
    {
        $sql = 'SELECT id, title, content, creationDate FROM articles WHERE id=?';
        return $this->createQUery($sql,[$articleId]);
    }
}