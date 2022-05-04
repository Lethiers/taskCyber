<?php
// session start
session_start();
//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

/*--------------------------ROUTER -----------------------------*/
$_SESSION['connect'] = "";
if ($_SESSION['connect'] == 1) {
    include'./view/view_header_connect.php';
}else {
    include'./view/view_header.php';
}

switch ($path) {
    // route page connexion
    case $path === "/taskCyber/acceuil":
        include './ctrl/ctrl_connect.php';
        break;
    // route page inscription
    case $path === "/taskCyber/sigIn":
        include './ctrl/ctrl_sign_in.php';
        break;
}
?>