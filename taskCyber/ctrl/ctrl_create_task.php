<?php

// conneixon à la BDD
include '../utils/connectBdd.php';
// ajout des fonctions task
include '../model/model_task.php';
// ---------------- ajout des fonctions cat -------------------
include '../model/model_cat.php';
// ajout header
include '../view/view_header_connect.php';
// ajout page html
include '../view/view_create_task.php';




if (isset($_POST['name_task']) && !empty($_POST['name_task']) &&
isset($_POST['content_task']) && !empty($_POST['content_task']) &&
isset($_POST['date_task']) && !empty($_POST['date_task'])) {

    $task = new Task();



    $task->setName($_POST['name_task']);
    $task->setContent($_POST['content_task']);
    $task->setDate($_POST['date_task']);



    $task->createTask($bdd);
    echo ''.$task->getName().' viens d\'être créer';
}else {
    echo 'merci de remplir les champs';
}









?>