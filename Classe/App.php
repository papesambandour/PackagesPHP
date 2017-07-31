<?php
/**
 * Created by PhpStorm.
 * User: P Samba Ndour
 * Date: 27/07/2017
 * Time: 10:15
 */

namespace Classe;


class App
{
    private static $pdo = null ;
    public static function getDatabase()
    {
        if(!isset($pdo))
        {
            self::$pdo = new Database("root","id2145878_izichat.sql");
        }
        return self::$pdo ;
    }
    public static function redirect($page)
    {
        header("Location : $page");
    }

}