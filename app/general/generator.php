<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 31/05/2016
 * Time: 01:44
 */

namespace App\general;


class generator
{
    /**
     * Génère une mot de passe aléatoire su 6 caractères Alphanumérique
     * @return string
     */
    public function password(){
        $caractere = "AZERTUIOPQSDFGHJLMWXCVBNazertyuiopqsdfghjklmwxcvbn0123456789";
        $shuffle = str_shuffle($caractere);
        $lenght = substr($shuffle, 0, 6);
        return $lenght;
    }

    /**
     * Génère un code aléatoire à 5 Caractères Alphanumérique
     * @return string
     */
    public function recovery_code(){
        $caractere = "AZERTUIOPQSDFGHJLMWXCVBN0123456789";
        $shuffle = str_shuffle($caractere);
        $lenght = substr($shuffle, 0, 5);
        return $lenght;
    }
}