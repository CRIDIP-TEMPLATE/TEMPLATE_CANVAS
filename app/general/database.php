<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 31/05/2016
 * Time: 01:41
 */

namespace App\general;


use PDO;
use PDOException;

class database
{
    protected $host         = "localhost";
    protected $username     = "gestcom";
    protected $password     = "1992_Maxime";
    protected $database     = "gestcom";
    private $db;

    /**
     * dataBase constructor. Permet de construire la method de connexion à la base de donnée courante ou définie lors de l'appel de la methode
     * @param null $host
     * @param null $username
     * @param null $password
     * @param null $database
     */
    public function __construct($host = null, $username = null, $password = null, $database = null)
    {
        if($host != null){
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }

        try{
            $this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
            ));
        }catch(PDOException $e){
            echo $e->getCode().": ".$e->getMessage();
        }
    }


    /**
     * Appel les différentes fonctions de base de données
     * @param $method
     * @param $sql
     * @param null $data
     * @return array|string
     */
    public function getDatabase($method, $sql, $data = null){
        switch($method){
            case 'query':
                return $this->query($sql, $data);
                break;

            case 'count':
                return $this->count($sql, $data);
                break;

            case 'execute':
                return $this->execute($sql, $data);
                break;

            default:
                echo "ERROR QUERY IN FUNCTION CALL !!";
                break;
        }
    }

    /**
     * Utilise uniquement pour faire des appels en base de donnée SELECT
     * @param $sql
     * @param null $data
     * @return array|string
     */
    private function query($sql, $data = null){
        try{
            $req = $this->db->prepare($sql);
            $req->execute($data);
            return $req->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            return $e->getCode().": ".$e->getMessage();
        }
    }

    /**
     * Permet de compter les occurences par rapport à une requete SELECT COUNT()
     * @param $sql
     * @param null $data
     * @return string
     */
    private function count($sql, $data = null){
        try {
            $req = $this->db->prepare($sql);
            $req->execute($data);
            return $req->fetchColumn();
        }catch(PDOException $e)
        {
            return $e->getCode().": ".$e->getMessage();
        }
    }

    /**
     * Permet de faire une appel d'insertion, modification ou de suppression en base de données
     * @param $sql
     * @param $data
     * @return int|string
     */
    private function execute($sql, $data){
        try {
            $req = $this->db->prepare($sql);
            $req->execute($data);
            return $req->rowCount();
        }catch(PDOException $e)
        {
            return $e->getCode().": ".$e->getMessage();
        }
    }
}