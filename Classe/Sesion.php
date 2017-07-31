<?php
/**
 * Created by PhpStorm.
 * User: P Samba Ndour
 * Date: 27/07/2017
 * Time: 17:01
 */

namespace Classe;


class Sesion
{
    public static $instance = null;
    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new Sesion();
        }
        return self::$instance;
    }
    private function __construct()
    {
       session_start();
    }
    public function setFlash($key,$message)
    {
        $_SESSION['flash'][$key] =$message ;
    }

    /**
     *permet de savoir s'il ya des message flash ou pas
     */
    public function asFlashes()
    {
        return isset($_SESSION['flash']);
    }
    public function getFlashes()
    {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash ;

    }
}