<?php

namespace Projet4OpenClassRooms\src\constraint;

class Constraint
{
    public function notBlank($name, $value)
    {
        if(empty($value)) {
            return '<p>Le champ doit être rempli !</p>';
        }
    }

    public function minLength($name, $value, $minSize)
    {
        if(strlen($value) < $minSize) {
            return '<p>Le champ doit contenir au moins '.$minSize.' caractères !</p>';
        }
    }

    public function maxLength($name, $value, $maxSize)
    {
        if(strlen($value) > $maxSize) {
            return '<p>Le champ doit contenir au maximum '.$maxSize.' caractères !</p>';
        }
    }

}
