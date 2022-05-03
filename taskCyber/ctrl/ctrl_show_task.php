<?php

// conneixon à la BDD
include '../utils/connectBdd.php';
// ajout des fonctions cat
include '../model/model_task.php';
// ajout header
include '../view/view_header_connect.php';
// ajout page html
include '../view/view_show_task.php';

// logical -----------------------------
$message = "";

$task = new Task(null,null,null);

$tab = $task->showAllTask($bdd);

foreach($tab as $value){
    echo '<li>'.$value->name_task.'<li>',
    '<li>'.$value->content_task.'<li>',
    '<li>'.$value->date_task.'<li>',
    '<a href="./ctrl_modify_task.php?id='.$value->id_task.'">Modify</a>',
    '<br>',
    '<a href="./ctrl_delete_task.php?id='.$value->id_task.'">Delete</a>';
}


echo '<ul>';
echo '<div>';

echo $message;

?>