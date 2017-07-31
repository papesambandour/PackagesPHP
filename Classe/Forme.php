<?php
namespace Classe;
class Forme
{
    private $data;
    private $surround = 'p';

    public function __construct($data = array())
    {
        $this->data = $data ;
    }

    /**
     * @param $html
     * @param $surround
     * @return mixed
     */
    private function surround($html)
    {
        return "<{$this->surround}> {$html}</{$this->surround}>";
    }

    private function getValue($name)
    {
        return (isset($this->data[$name])) ? ($this->data[$name]): null;
    }

    /**
     * @param $name
     */
    public function input($name, $type)
    {
        return $this->surround("<input type='{$type}' name='{$name}' value='{$this->getValue($name)}' >");
    }

    public function submit()
    {
        return $this->surround("<input type='submit' name='submit' value='Envoyer' >");
    }


}