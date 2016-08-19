<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 31/05/2016
 * Time: 01:40
 */

namespace App\general;


class constante
{
    public $HTTP              = "";
    public $URL               = "";
    public $ASSETS            = "view/assets/";
    public $SOURCES           = "";
    public $NOM_SITE          = "";
}
class redirect extends constante
{
    /**
     * @param array $dos Il permet d'envoyer à la fonction la liste des dossiers à parcourir sous forme de tableau
     * @param bool|true $assets Permet d'insérer de manière automatique le dossier 'assets'
     * @param bool $sources Renvoie les informations vers le fichiers DataSources de CRIDIP
     * @return string Suivant le bool $assets, il retourne la redirection sous format de lien(string)
     */
    public function getUrl($dos = array(), $assets = true, $sources = false)
    {

        if($assets === true)
        {
            return $this->HTTP.$this->URL.$this->ASSETS.$this->parseArray($dos);
        }elseif($sources === true){
            return $this->SOURCES;
        }else{
            return $this->HTTP.$this->URL.$this->parseArray($dos);
        }

    }


    /**
     * @param $dos array Permet de parser sous forme string le tableau array=$dos
     * @return string retourne un format standard de link HTML
     */
    private function parseArray($dos)
    {
        return implode("/", $dos);
    }

    public function getSources($redirect){
        return $this->SOURCES.$redirect;
    }

    public function redirect($view = null, $sub = null, $data = null, $type = null, $service = null, $text = null){

        if(!empty($view)){$redirect = "index.php?view=".$view;}
        if(!empty($sub)){$redirect .= "&sub=".$sub;}
        if(!empty($data)){$redirect .= "&data=".$data;}
        if(!empty($type)){$redirect .= "&".$type."=".$service."&text=".$text;}

        header("Location: ".$this->getUrl(array(), false).$redirect);

    }

    /**
     * @param $folder //Dossier de la bibliothèque d'icones
     * @param $name //Nom de l'icone
     * @param string $type //Type d'extension ciblé (png, jpg, bmp, etc...)
     * @return string // Retourne le lien à inserer dans une balise
     */
    public function get_icon($folder, $name, $type = 'png'){
        return $this->getUrl(array('global/'))."images/icons/".$folder."/".$name.".".$type;
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

    public function racine(){
        return $this->HTTP.$this->DOMAINE;
    }

}