<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 31/05/2016
 * Time: 01:43
 */

namespace App\general;


class encrypt
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Permet d'encrypter le nom d'utilisateur en sha1. Il prend le nombre de caractère du champs username et applique ce chiffre au SHA1 en ajoutant
     * -> username.
     * @return string
     */
    private function enc_username()
    {
        $string = strlen($this->username);
        $encrypt = sha1($string.$this->username);
        return $encrypt;
    }

    /**
     * Encrypte le mot de passe en SHA1
     * @return string
     */
    private function enc_password()
    {
        $encrypt = sha1($this->password);
        return $encrypt;
    }

    /**
     * Permet d'encrypter en SHA1 le username->enc_username et le mot de passe->enc_password.
     * -> Ont obtient alors un encryptage SHA1 de 5 catégories indéchiffrable sauf par le décrypteur qui lui remote toutes les informations de l'encrypteur.
     * @return string
     */
    public function encrypt()
    {
        $hash_user = $this->enc_username();
        $hash_pass = $this->enc_password();
        $lend = $hash_user.$hash_pass;
        $encrypt = sha1($lend);
        return $encrypt;
    }

    /**
     * Permet de créer un TOKEN sous la base Encrypteur NOCTUS, il est vérifier et déchiffrer par le décrypteur NOCTUS
     * @return string
     */
    public function new_token()
    {
        $date_format = new date();

        $date = $date_format->format_strt("d-m-Y H:i:s");
        $username = $this->username;
        $password = $this->password;

        $chaine = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN&0123456789_@";
        $shuff = str_shuffle($chaine);

        $key = substr($shuff, 0, 15);

        $token = $username."_".$key."_".$password."_".time();
        return $token;
    }
}