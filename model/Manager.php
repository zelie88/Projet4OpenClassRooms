<?php
class Manager
{
    protected function dbConnect()
    {
            $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'zelie', '');
            return $db;
    }
}