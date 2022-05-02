<?php
session_start();
// conneixon à la BDD
include '../utils/connectBdd.php';
// ajout des fonctions
include '../model/model_task.php';
// ajout foncitons user
include '../model/model_user.php';
// ajout header
include '../view/view_header_connect.php';
// ajout page html
include '../view/view_task_acceuil.php';

// -------------------------------------------------recup ID et NAME --------------------
    $data = getIdAndName($bdd,$_SESSION['login']);
    foreach($data as $value){
        $_SESSION['name']=$value['name_user'];
        $_SESSION['id']=$value['id_user'];
    }
    if (isset($_SESSION['connected'])) {
        echo '<h2>bienvenue '.$_SESSION['name'].'<h2>';
    }else {
        header('Location: ./ctrl/ctrl_connect.php');
    }
?>