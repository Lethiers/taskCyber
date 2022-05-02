<?php
session_start();
// destrucituon session
session_destroy();
//redirection acceuil
header('Location: ./ctrl_connect.php');

?>