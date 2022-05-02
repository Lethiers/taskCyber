<?php

// conneixon à la BDD
include '../utils/connectBdd.php';
// ajout des fonctions cat
include '../model/model_cat.php';
// ajout header
include '../view/view_header_connect.php';
// ajout page html
include '../view/view_create_cat.php';

if (isset($_POST['name_cat'])&& !empty($_POST['name_cat'])) {
    $name = $_POST['name_cat'];
    createCat($bdd,$name);
    echo ''.$name.' est créée';
}else {
    echo 'merci de remplir les champs';
}
echo('<br>');


?>