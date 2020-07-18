<?php

namespace Projet4OpenClassRooms\src\model;

class Comment
{
    private $id;
    private $author;
    private $comment;
    private $comment_date;
    private $flag;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getAuthor()
    {
        return $this->author;
    }
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getComment()
    {
        return $this->comment;
    }
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getCommentDate()
    {
        return $this->comment_date;
    }
    public function setCommentDate($comment_date)
    {
        $this->comment_date = $comment_date;
    }

    public function isFlag()
    {
        return $this->flag;
    }

    public function setFlag($flag)
    {
        $this->flag = $flag;
    }
}