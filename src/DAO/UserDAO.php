<?php

namespace Projet4OpenClassRooms\src\DAO;

use Projet4OpenClassRooms\config\Parameter;

class UserDAO extends DAO
{
    public function login(Parameter $post)
    {
        $sql = 'SELECT pseudo, password FROM user WHERE pseudo = ?';
        $data = $this->createQuery($sql, [
            $post->get('pseudo')
        ]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($post->get('password'), $result['password']);
        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid
        ];
    }

    public function updatePassword(Parameter $post, $pseudo)
    {
        $sql = 'UPDATE user SET password = ? WHERE pseudo = ?';
        $this->createQuery($sql, [
            password_hash($post->get('password'), PASSWORD_BCRYPT),
            $pseudo
        ]);
    }
    
}