<?php
session_start();
// conneixon à la BDD
include './utils/connectBdd.php';
// ajout des fonctions
include './model/model_user.php';
// ajout page html
include './view/view_sign_in.php';
// import fonction hashage
include './utils/function.php';

// on vérifie si les champ sont remplis
$message = "";
if (isset($_POST['signIn'])) {
    if (isset($_POST['name_user'])&& !empty($_POST['name_user']) 
        && isset($_POST['first_name_user'])&& !empty($_POST['first_name_user']) 
        &&isset($_POST['login_user'])&& !empty($_POST['login_user']) 
        &&isset($_POST['pwd_user'])&& !empty($_POST['pwd_user'])) {
    // set new obj
    $user = new Utilisateur();
    // set variable
    $user->setName($_POST['name_user']);
    $user->setFirstName($_POST['first_name_user']);
    $user->setLogin($_POST['login_user']);

    // hash of pwd

    $options = [
        'cost' => 8,
    ];

    $pwd = password_hash($_POST['pwd_user'],PASSWORD_BCRYPT, $options);
    $user->setPwd($pwd);


    // check if login is avaible
    $login = $user->loginExist($bdd,$user->getLogin());
    if ($login == true) {
    // create account
        $user->logInUser($bdd);
        $message = 'Hi '.$user->getLogin().' welcome in our community';
    }else {
        $message = "login already use";
    }


    
    }else {
        $message = "please fill in the fields";
    }
}
else {
    $message = "please create your account";
}

echo $message;

?>