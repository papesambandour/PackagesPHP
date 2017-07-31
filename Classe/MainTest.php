<?php
namespace Classe;
require_once 'Autoload.php';
Autoload::register();
/**
 * Created by PhpStorm.
 * User: P Samba Ndour
 * Date: 27/07/2017
 * Time: 09:16
 */
$F = new Forme($_POST);
$pdo = App::getDatabase();
$validator = new Validador($_POST);
$validator->isMail("email","Ce mail n'est pas valide");
$validator->isUniq('email',"Cet mail est dejat prie","users",$pdo);
$validator->isUniq('username',"Cet user  est dejat prie","users",$pdo);
$validator->isAlfaNum("username","Speudo no valide");
$validator->isConfirmPwd("password","Les deux mot de passe ne correponde pas");
print_r($validator->getMessageErr());
if($validator->isValide())
{
   $user = new User($pdo);
   $user->register($_POST['username'],$_POST['password'],$_POST['email']);
    echo " <br><br>VALIDER <br><br>";
}
else{
    echo  "ERROR";
}

?>
<!DOCTYPE html>
<html>
    <header>
        <title>FORM.PHP</title>
        <meta charset="utf-8">
    </header>
    <body>
            <form method="post" action="MainTest.php">
                <?php
                echo "SPeudo :". $F->input("username","text");
                echo "Email" .$F->input("email","email");
                echo "Password" .$F->input("password","password");
                echo "Confirm password" .$F->input("password_confirm","password");
                echo $F->submit();
                ?>
            </form>
    </body>
</html>

