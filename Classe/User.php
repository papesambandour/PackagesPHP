<?php
namespace Classe;
/**
 * Created by PhpStorm.
 * User: P Samba Ndour
 * Date: 26/07/2017
 * Time: 18:44
 */
class User
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public  function randoms($length)
    {
        $mots="qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789";
        return substr(str_shuffle(str_repeat($mots,60)),0,$length);
    }
    public function register($username,$password,$email)
    {
        $password = hash("sha256", 'password');
        $token = $this->randoms(60);
        $req = $this->db->query("INSERT INTO users SET username= ?, password=? ,email=?, confirmation_token=? ",
                [$username,$password,$email,$token]);
        $id_user= $this->db->lastInsetId();
        $liens= "localhost/Github/PackagesPHP/Classe/confirm.php?id=$id_user&token=$token";
        $envoi = "Pour valider votre email click ce ";
        $message = $envoi.$liens ;
        mail($email,"Mail de confirmation sur IZICHAT",$message);
    }

    public function confirmUser($user_id,$token)
    {
        $req = $this->db->query("select * from users where id = ?",[$user_id]);
        $resul = $req->fetch();
        if($resul && $resul->confirmation_token ==$token )
        {
            $this->db->query("update users set confirmation_token= NULL, validation_at=now() where id= ?",[$user_id]);
            $_SESSION['auth']= $resul;
            // header("Location: account.php");
            // exit();
        }else{
            return false ;

        }
    }
}