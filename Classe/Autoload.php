<?php
/**
 * Created by PhpStorm.
 * User: P Samba Ndour
 * Date: 27/07/2017
 * Time: 10:33
 */

namespace Classe;


class Autoload
{
    public static function register()
    {
        spl_autoload_register(array(__CLASS__,'autoload'));
    }

    /**
     * @param $classe_name
     */
    public static function autoload($classe_name)
    {
       // die($classe_name);
        $classe_name = \str_replace("Classe\\","",$classe_name);
        require_once $classe_name.'.php';
    }

}