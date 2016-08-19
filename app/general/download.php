<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 31/05/2016
 * Time: 01:43
 */

namespace App\general;


class download
{
    /**
     * Permet de forcer le téléchargement d'un fichier
     * @param $nom
     * @param $read_file
     */
    public function download_file($nom, $read_file)
    {
        header("Content-Type: application/octet-stream");
        header("Content-disposition: attachment; filename=".$nom);
        header('Pragma: no-cache');
        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        readfile($read_file);
        exit();
    }
}