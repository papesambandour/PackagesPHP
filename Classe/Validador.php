<?php
/**
 * Created by PhpStorm.
 * User: P Samba Ndour
 * Date: 27/07/2017
 * Time: 09:57
 */

namespace Classe;


class Validador
{
   private $data ;
   private $error= array();

    /**
     * Validador constructor.
     * @param $data
     * @internal param $pdo
     * @internal param $data
     */
    public function __construct($data)
   {
       $this->data = $data ;
   }

    private function getValue($champ)
    {
        return ($this->dataExist($champ)) ? ($this->data[$champ]): null;
    }
    private function dataExist($champ)
    {
        return isset($this->data[$champ]);
    }

    /**
     * @param $cham
     */
    public function isAlfaNum($champ,$message)
    {
        if(!preg_match("/^([a-zA-Z])([0-9a-z-A-Z_]{4,})$/",$this->getValue($champ)) &&  $this->dataExist($champ))
        {
            $this->error[$champ] = $message;
        }
    }
    /**
     * @param $mail
     * @internal param $this
     * @internal param $th
     * @internal param $mail
     */
    public function isMail($mail,$message)
   {
       if(!filter_var($this->getValue($mail),FILTER_VALIDATE_EMAIL) && $this->dataExist($mail))
       {
           $this->error[$mail] = $message ;
       }

   }

    /**
     * @param $champ
     * @param $message
     * @param $table
     * @param $pdo
     * @internal param $speudo
     */
    public  function isUniq($champ, $message, $table,$pdo)
   {
      $req = $pdo->query("SELECT * FROM $table WHERE $champ = ?",[$this->getValue($champ)]);
      $resut = $req->fetch();
      if($resut)
      {
          $this->error[$champ] = $message ;
      }
   }
   public function isConfirmPwd($password,$message)
    {
        if(($this->getValue($password) != $this->getValue($password."_confirm")) && !empty($this->getValue($password))  )
        {
            $this->error[$password] = $message ;
        }
    }

    /**
     * @return bool
     */
    public function isValide()
    {
        return (empty($this->error) && !empty($_POST));
    }

   public function getMessageErr()
   {
       return $this->error ;
   }

}