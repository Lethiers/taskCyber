<?php
    session_destroy();
    //test si $_COOKIE['PHPSESSID'] existe
    if(isset($_COOKIE['PHPSESSID'])){
        //on le supprime
        unset($_COOKIE['PHPSESSID']);
    }
    header('Location: /taskCyber/acceuil');
?>