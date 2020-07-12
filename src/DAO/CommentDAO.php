<?php

namespace Projet4OpenClassRooms\src\DAO;

use Projet4OpenClassRooms\src\model\Comment;

class CommentDAO extends DAO
{
    private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setAuthor($row['author']);
        $comment->setComment($row['comment']);
        $comment->setCommentDate($row['comment_date']);
        return $comment;
    }

    public function getComments($articleId)
    {
        $sql = 'SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC';
        $result = $this->createQuery($sql, [$articleId]);
        $comments = [];
        foreach ($result as $row)
            {
                $commentId = $row['id'];
                $comments[$commentId] = $this->buildObject($row);
            }
        $result->closeCursor();
        return $comments;
    }
}