<?php
namespace Classe ;
require_once 'Autoload.php';
Autoload::register();
require_once '../../../izichat/incl/function.php';
just_login();
$pdo = App::getDatabase();
$user_id = $_GET['id'];
$token = $_GET['token'];
$user = new User($pdo);

if( $user->confirmUser($user_id,$token))
{
    $_SESSION['flash']['succes']= "Votre Confirmation est bien valider.<br>Veillez vous connecter avec votre login et votre passe";
    App::redirect("#");
    
   echo $_SESSION['flash']['succes'];
   // header("Location: account.php");
   // exit();
}else{
    $_SESSION['flash']['danger']= "Ce token n'est plus valide ";
    echo $_SESSION['flash']['danger'];
  //  header("Location: index.php");

}