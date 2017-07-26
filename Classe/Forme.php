<?php

/**
 * Created by PhpStorm.
 * User: P Samba Ndour
 * Date: 26/07/2017
 * Time: 15:41
 */
class Forme
{
    private $data;
    private $surround = 'p';

    public function __construct($data = array())
    {

    }

    private function surround($html)
    {
        return "<$surround>"
    }
}