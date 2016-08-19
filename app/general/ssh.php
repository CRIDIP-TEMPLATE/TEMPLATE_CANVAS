<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 31/05/2016
 * Time: 01:45
 */

namespace App\general;


class ssh
{
    protected $server   = "";
    protected $port     = "";
    protected $user     = "";
    protected $pass     = "";
    public $connect     = "";

    protected $error_connect = "Système de Connexion SSH2 inopérant !<br>Impossible de ce connecter au serveur distant.";

    public function connexion($server = null, $port = null, $user = null, $pass = null, $external = false)
    {
        if($external == false)
        {
            $connect = ssh2_connect($this->server, $this->port);
            $login = ssh2_auth_password($connect, $this->user, $this->pass);

            if(!$login)
            {
                $text = "Erreur SSH2: Connexion echoué, veuillez vérifier les paramêtre de l'application app/app.php <i>(CLASS)</i>.";
                header("Location: ../index.php?view=admin_sha&sub=error&text=$text");
            }else{
                return $connect;
            }
        }else{
            $connect = ssh2_connect($server, $port);
            $login = ssh2_auth_password($connect, $user, $pass);

            if(!$login)
            {
                $text = "Erreur SSH2: Connexion echoué, veuillez vérifier les paramêtre de l'application app/app.php <i>(CLASS)</i>.";
                header("Location: ../index.php?view=admin_sha&sub=error&text=$text");
            }else{
                return $connect;
            }
        }
    }
}