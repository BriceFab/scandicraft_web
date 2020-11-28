<?php

namespace App\Classes;

class EnumRoles
{

    const ROLE_USER = 'ROLE_USER';
    const ROLE_HELPEUR = 'ROLE_HELPEUR';
    const ROLE_MANAGEUR = 'ROLE_MANAGEUR';
    const ROLE_MODERATEUR = 'ROLE_MODERATEUR';
    const ROLE_ADMIN = 'ROLE_ADMIN';

    public static function getRoles() {
        return [
            'Joueur' => self::ROLE_USER,
            'Helpeur' => self::ROLE_HELPEUR,
            'Manageur' => self::ROLE_MANAGEUR,
            'Moderateur' => self::ROLE_MODERATEUR,
            'Administrateur' => self::ROLE_ADMIN,
        ];
    }

}
