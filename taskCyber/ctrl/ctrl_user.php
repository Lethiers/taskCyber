<?php
session_start();
// conneixon à la BDD
include '../utils/connectBdd.php';
// ajout des fonctions
include '../model/model_user.php';
// ajout header
include '../view/view_header_connect.php';
// ajout page html
include '../view/view_user.php';


// logique ----------------------------------------

$util = new Utilisateur();

$tab = $util->connectUser($bdd,$_SESSION['login']);
echo '<form action="" method="post">';
foreach($tab as $value){
    echo '<p>name :</p>';
    echo '<input type="text" name="name_user" value="'.$value->name_user.'">';
    echo '<p>first name :</p>';
    echo '<input type="text" name="first_name_user" value="'.$value->first_name_user.'">';
    echo '<p>login : </p>';
    echo '<input type="text" name="login_user" value="'.$value->login_user.'">';
}
        echo '<input type="submit" value="modify" name="signIn">';
    echo '</form>';

// verification si on clique sur bouton modify
if (isset($_POST['signIn'])) {
// verification si le formulaire et remplie
    if ($_POST['name_user'] && !empty($_POST['name_user']) &&
    $_POST['first_name_user'] && !empty($_POST['first_name_user']) &&
    $_POST['login_user'] && !empty($_POST['login_user'])) {

// changement des attributs        
        $util->setName($_POST['name_user']);
        $util->setFirstName($_POST['first_name_user']);
        $util->setLogin($_POST['login_user']);

// modification de l'utilisateur
        $util->modifyUser($bdd,$_SESSION['id']);
    }else {
        $message = "please fill in the fields";
    }
}else {
    $message = "please register your changes";
}


?>