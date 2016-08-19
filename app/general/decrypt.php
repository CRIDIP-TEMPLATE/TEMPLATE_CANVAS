<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 31/05/2016
 * Time: 01:43
 */

namespace App\general;


class decrypt
{
    private $encrypt;
    private $username;
    private $password;

    public function __construct($encrypt, $username, $password)
    {
        $this->encrypt = $encrypt;
        $this->username = $username;
        $this->password = $password;
    }

    private function dec_username()
    {
        $string = strlen($this->username);
        $encrypt = sha1($string.$this->username);
        return $encrypt;
    }

    private function dec_password()
    {
        $encrypt = sha1($this->password);
        return $encrypt;
    }

    /**
     * Décrypte les information de l'encrypteur et vérifie la cohérance des informations enregistrer.
     * @return bool
     */
    public function decrypt()
    {
        $hash_user = $this->dec_username();
        $hash_pass = $this->dec_password();
        $lend = $hash_user.$hash_pass;
        $decrypt = sha1($lend);

        if($decrypt == $this->encrypt){
            return true;
        }else{
            return false;
        }

    }

    /**
     * Décrypte le TOKEN crypter par NOCTUS
     * @param $token
     * @return bool
     */
    public function decrypt_token($token){
        $tab = explode("_", $token);

        if($tab[3] <= $tab[3] -1800 ){
            return false;
        }else{
            if($tab[0] == $this->username AND $tab[2] == $this->password){
                return true;
            }else{
                return false;
            }
        }

    }
}