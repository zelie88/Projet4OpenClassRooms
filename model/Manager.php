<?php

class Manager
{
    const Db_HOST='mysql:host=localhost;dbname=blog;charset=utf8';
    const Db_USER='root';
    const Db_PASS='';

    protected function getConnection()
    {
        try{
            $connection=new PDO(self::Db_HOST,self::Db_USER,self::Db_PASS);
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $connection;
        }

        catch(Exception $errorConnection)
        {
            die('Erreur de connexion:'.$errorConnection->getMessage());

        }
    }
}