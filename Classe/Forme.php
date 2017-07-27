<?php

class Forme
{
    private $data;
    private $surround = 'p';

    public function __construct($data = array())
    {

    }

    /**
     * @param $html
     * @param $surround
     * @return mixed
     */
    private function surround($html, $surround)
    {
        return "<{$this->surround}> {$html}</{$this->surround}>";
    }
}