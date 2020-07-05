<?php

namespace Projet4OpenClassRooms\src\DAO;

class CommentDAO extends DAO
{
    public function getComments($articleId)
    {
        $sql = 'SELECT id, author, comment, comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC';
        return $this->createQuery($sql, [$articleId]);
    }
}