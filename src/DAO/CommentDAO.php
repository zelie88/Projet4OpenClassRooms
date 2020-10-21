<?php

namespace Projet4OpenClassRooms\src\DAO;

use Projet4OpenClassRooms\src\model\Comment;
use Projet4OpenClassRooms\config\Parameter;


class CommentDAO extends DAO
{
    private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setAuthor($row['author']);
        $comment->setComment($row['comment']);
        $comment->setCommentDate($row['comment_date']);
        $comment->setFlag($row['flag']);
        return $comment;
    }

    public function getComments($articleId)
    {
        $sql = 'SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date, flag FROM comments WHERE post_id = ? ORDER BY id DESC';
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

    public function addComment(Parameter $post, $articleId)
    {
        $sql = 'INSERT INTO comments (post_id, author, comment, comment_date, flag) VALUES (?, ?, ?, NOW(), ?)';
        $this->createQuery($sql, [
            $articleId,
            $post->get('author'),
            $post->get('comment'), 
            0
        ]);
    }

    public function flagComment($commentId)
    {
        $sql = 'UPDATE comments SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [
            1,
            $commentId
        ]);
    }

    public function unflagComment($commentId)
    {
        $sql = 'UPDATE comments SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [
            0,
            $commentId
        ]);
    }

    public function getFlagComments()
    {
        $sql = 'SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date, flag FROM comments WHERE flag = ? ORDER BY comment_date DESC';
        $result = $this->createQuery($sql, [1]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }

    public function deleteComment($commentId)
    {
        $sql = 'DELETE FROM comments WHERE id = ?';
        $this->createQuery($sql, [$commentId]);
    }
}