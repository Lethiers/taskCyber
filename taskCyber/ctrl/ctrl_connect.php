<?php
session_start();

// conneixon à la BDD
include './utils/connectBdd.php';
// ajout des fonctions
include './model/model_user.php';
// ajout page html
include './view/view_connect.php';

$message = "";


if (isset($_POST['login'])) {
    
    if (isset($_POST['login_user'])&&!empty($_POST['login_user'])
    &&isset($_POST['pwd_user'])&&!empty($_POST['pwd_user'])) {

        $user = new Utilisateur();
        $login=$_POST['login_user'];
        // $mdp=$_POST['pwd_user'];

        $tab = $user->connectUser($bdd,$login);
        if (count($tab) !== 0) {
            if (password_verify($_POST['pwd_user'],$tab[0]->pwd_user)) {
                $_SESSION['id'] = $tab[0]->id_user;
                $_SESSION['connect'] = 1;
                var_dump($_SESSION['connect']);
                $_SESSION['login'] = $tab[0]->login_user;
                $message = 'your are connected '.$_SESSION['login'].'';
            }
        }else{
            $message = "account doesnt exist";
        }
        }else {
            $message = "error while authenticating check if your account exists";
        }

}else {
    $message = "thank you for logging in";
}

echo $message;

?>