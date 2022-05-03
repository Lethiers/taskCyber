<?php
// conneixon à la BDD
include '../utils/connectBdd.php';
// ajout des fonctions task
include '../model/model_task.php';
// ---------------- ajout des fonctions cat -------------------

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $task = new Task(null,null,null);
    $task->deleteTask($bdd,$id);
    header('Location:./ctrl_show_task.php?id='.$id.'');
}else {
    $message = "merci de revenir avec votre tache";
}

?>