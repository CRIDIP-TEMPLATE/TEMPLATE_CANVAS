<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 31/05/2016
 * Time: 01:44
 */

namespace App\general;


class images
{
    /**
     * @param $bundle   // Dossier d'icone (essential, etc...)
     * @param $icon     // Nom de l'icone sans l'extension
     * @return string   // Retourne le delta IMG SRC
     */
    public function get_icons($bundle, $icon)
    {
        $redirect = new redirect();
        return '<img src="'.$redirect->getUrl(array('global/')).'images/icons/'.$bundle.'/'.$icon.'.png" height="30"/>';
    }

    /**
     * @param $bundle           // Dossier d'images (avatar, gallery, etc...)
     * @param $images           // Nom de l'image
     * @param $ext              // Extension de l'image (Par défault: PNG)
     * @param string $class     // Permet de rajouter une class à l'images (par default: VOID)
     * @param string $width     // Permet de désigner une largeur à l'image (par default: VOID)
     * @param string $height    // Permet de désigner une hauteur à l'image (par default: VOID)
     * @return string           // Retourne le delta IMG SRC
     */
    public function get_images($bundle, $images, $ext = "png", $class = "", $width = "", $height = "")
    {
        $redirect = new redirect();
        return '<img src="'.$redirect->getUrl(array('global/')).'images/'.$bundle.'/'.$images.'.'.$ext.'" class="'.$class.'" width="'.$width.'" height="'.$height.'"/>';
    }
}