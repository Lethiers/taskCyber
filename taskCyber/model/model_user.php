

<?php

class Utilisateur{


    // attributs
    private $id;
    private $name;
    private $first;
    private $login;
    private $pwd;

    // constructor
    public function __constructor($name,$first,$login,$pwd){
        $this->name = $name;
        $this->first = $first;
        $this->login = $login;
        $this->pwd = $pwd;
    }

    // getter and setter

    public function getId():int{
        return $this->id_user;
    }
    public function setId($id):void{
        $this->id_user = $id;
    }



    public function getName():string{
        return $this->name_user;
    }
    public function setName($name):void{
        $this->name_user = $name;
    }


    public function getFirstName():string{
        return $this->first_name_user;
    }
    public function setFirstName($first):void{
        $this->first_name_user = $first;
    }



    public function getLogin():string{
        return $this->login_user;
    }
    public function setLogin($login):void{
        $this->login_user = $login;
    }



    public function getPwd():string{
        return $this->pwd_user;
    }
    public function setPwd($pwd):void{
        $this->pwd_user = $pwd;
    }

    // methode


    // fonction d'enregistrement

    function logInUser($bdd){
        try {
            $req= $bdd->prepare('INSERT INTO user(name_user,first_name_user,login_user,pwd_user)VALUES(:name_user,:first_name_user,:login_user,:pwd_user)');
            $req->execute(array(
                ':name_user'=> $this->getName(),
                ':first_name_user'=> $this->getFirstName(),
                ':login_user'=> $this->getLogin(),
                'pwd_user'=>$this->getPwd()
            ));
        }catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

    // fonction pour vérifier si le mail et mdp existe
    function connectUser($bdd,$login):array{
        try {
            $req = $bdd->prepare('SELECT * FROM user WHERE login_user=:login_user');
            $req->execute(array(
                ':login_user'=> $login,
            ));
            $data = $req->fetchALL(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            die('Erreur :'.$e->getMessage());
        }
    }

    // fonction pour vérifier si le login existe déjà
    function loginExist($bdd,$login):bool{
        try {
            $req = $bdd->prepare('SELECT login_user FROM user WHERE login_user=:login_user');
            $req->execute(array(
                ':login_user'=> $login,
            ));
            $data = $req->fetchALL(PDO::FETCH_ASSOC);
            if ($data != NULL) {
                return false;
            }else {
                return true;
            }
        } catch (Exception $e) {
            die('Erreur :'.$e->getMessage());
        }
    }

    // fonction pour modifier un utilisateur
    function modifyUser($bdd,$id):void{
        try {
            $req = $bdd->prepare('UPDATE user SET name_user=:name_user,first_name_user=:first_name_user,login_user=:login_user WHERE id_user=:id_user');
            $req->execute(array(
                'name_user' => $this->getName(),
                'first_name_user' => $this->getFirstName(),
                'login_user' =>$this->getLogin(),
                'id_user' =>$id
            ));
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

    // fonction pour supprimer son compte
    function deleteUser($bdd,$id):void{
        try {
            $req=$bdd->prepare('DELETE FROM user WHERE id_user=:id_user');
            $req->execute(array(
                'id_user' => $id
            ));
            
        }catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }
}

?>