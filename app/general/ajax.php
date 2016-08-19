<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 31/05/2016
 * Time: 01:39
 */

namespace App\general;


class ajax
{
    /**
     * Permet de savoir si la requete exécuter est de type AJAX()
     * @return bool
     */
    public function is_ajax(){
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }
}