<?php

// conneixon à la BDD
include '../utils/connectBdd.php';
// ajout des fonctions cat
include '../model/model_task.php';
// ajout header
include '../view/view_header_connect.php';
// ajout page html
include '../view/view_modify_task.php';

// logical -----------------------------
$message = "";

// if we found an id we strat function modify
if (isset($_GET['id'])) {

    $task = new Task(null,null,null);
    $task->showTask($bdd,$_GET['id']);
    
    if (isset($_POST['modify'])) {
        if (isset($_POST['name_task'])&& !empty($_POST['name_task']) &&
        isset($_POST['content_task'])&& !empty($_POST['content_task']) &&
        isset($_POST['date_task'])&& !empty($_POST['date_task'])) {
            $task->setName($_POST['name_task']);
            $task->setContent($_POST['content_task']);
            $task->setDate($_POST['date_task']);
            $task->modifyTask($bdd,$_GET['id']);

            $message = 'la tache suivante '.$task->getName().' viens d\'être modifier';
        }else {
            $message = "merci de ne pas laisser les champs vides";
        }
    }else {
        $message = "merci de clicker sur le bouton modifier";
    }

}else {
    $message = "merci de revenir avec votre tache";
}

echo $message;
?>

