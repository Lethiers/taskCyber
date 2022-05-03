<?php

class Categorie{

// attribut---------------------------
private $name;

// constructor-----------------------

    public function __constructor($name){
        $this->name = $name;
    }

// getter and setteur -------------------
    public function getName():string{
        return $this->name;
    }
    public function setName($name):void{
        $this->name = $name;
    }
// methode --------------------
// function create
    function createCat($bdd){
        try {
            $req=$bdd->prepare('INSERT INTO cat(name_cat)VALUES(:name_cat)');
            $req->execute(array(
                ':name_cat'=>$this->getName()
            ));
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }


// function show
    function showCat($bdd){
        try {
            $req=$bdd->prepare('SELECT*FROM cat');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }

    } 

// function delete
    function deleteCat($bdd,$id):void{
        try {
            $req=$bdd->prepare('DELETE FROM cat WHERE id_cat=:id_cat');
            $req->execute(array(
                'id_cat' => $id
            ));
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

// function modify
    function modifyCat($bdd,$id){
        try {
            $req=$bdd->prepare('UPDATE cat SET name_cat=:name_cat WHERE id_cat=:id_cat');
            $req->execute(array(
                'name_cat' => $this->name,
                'id_cat' => $id
            ));
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

}

?>