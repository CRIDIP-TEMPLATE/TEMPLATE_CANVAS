<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 31/05/2016
 * Time: 01:45
 */

namespace App\general;


class number
{
    /**
     * Retourne et format un chiffre au format décimal (0,00)
     * @param $chiffre
     * @return string
     */
    public function number_decimal($chiffre)
    {
        return number_format($chiffre, 2, ',', ' ');
    }

    /**
     * Retourne et formate un chiffre en montant en euro
     * @param $chiffre
     * @return string
     */
    public function euro($chiffre)
    {
        return number_format($chiffre, 2, ',', ' ')." €";
    }
}