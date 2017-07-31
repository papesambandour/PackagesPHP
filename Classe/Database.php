<?php
/**
 * Created by PhpStorm.
 * User: P Samba Ndour
 * Date: 27/07/2017
 * Time: 10:15
 */

namespace Classe;


class Database
{
    private $pdo ;

    public function __construct($login,$dbname,$host = "localhost",$password="")
    {
        try
        {
            $this->pdo = new \PDO("mysql:host=$host;dbname=$dbname", $login, $password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        }
        catch (\Exception $e) {
            die('ERREUR : ' . $e->getMessage());

        }
    }

    /**
     * @param $requet
     * @param null $param
     * @return mixed
     */
    public function query($requet, $param=null)
    {
        if($param)
        {
            $req = $this->pdo->prepare($requet);
            $req->execute($param);
            return $req;
        }
        else
        {
            return $this->query($requet);
        }
    }
    public function lastInsetId()
    {
       return $this->pdo->lastInsertId();
    }
}