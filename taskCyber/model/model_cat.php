<?php
function createCat($bdd,$name){

    $req=$bdd->prepare('INSERT INTO cat(name_cat)VALUES(:name_cat)');
    $req->execute(array(
        ':name_cat'=>$name
    ));
}

// pas de fonctionnement ------------------------------------manque inner join je pense-------------
// function recupCat($bdd){
//     $req=$bdd->prepare('SELECT name_cat FROM cat');
//     $req->execute();
//     $data = $req->fetchALL(PDO::FETCH_ASSOC);
// }
// $list = recupCat($bdd);
// foreach($list as $value){
//     echo $value;
// }
// var_dump($list);



?>