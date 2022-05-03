<?php

class Task{
    
// attribut
private $id;
private $name;
private $content;
private $date;
// private $validate;


// constructor
    public function __constructor($name,$content,$date){
        $this->name = $name;
        $this->content = $content;
        $this->date = $date;

    }

// setteur and getteur
    public function getId():int{
        return $this->id_task;
    }
    public function getName():string{
        return $this->name_task;
    }
    public function getContent():string{
        return $this->content_task;
    }
    public function getDate():string{
        return $this->date_task;
    }
    // public function getValidate():string{
    //     return $this->validate_task;
    // }



    public function setId($id):void{
        $this->id_task = $id;
    }
    public function setName($name):void{
        $this->name_task = $name;
    }
    public function setContent($content):void{
        $this->content_task = $content;
    }
    public function setDate($date):void{
        $this->date_task = $date;
    }
    // public function setValidate($validate):void{
    //     $this->validate_task = $validate;
    // }


// methode

// create a task
    function  createTask($bdd){
        try {
            $req = $bdd->prepare('INSERT INTO task (name_task, content_task, date_task) 
            VALUES(:name_task, :content_task, :date_task)');
            $req->execute(array(
                ':name_task'=> $this->getName(),
                ':content_task'=> $this->getContent(),
                ':date_task'=> $this->getDate(),

            ));
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

// show task
    function showAllTask($bdd):array{
        try {
            $req = $bdd->prepare('SELECT * FROM task');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;

        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

// show task
    function showTask($bdd,$id){
        try {
            $req = $bdd->prepare('SELECT * FROM task WHERE id_task=:id_task');
            $req->execute(array(
                'id_task' => $id
            ));
            while ($data = $req->fetch()) {
                $name= $data['name_task'];
                $content= $data['content_task'];
                $date= $data['date_task'];

                echo '<input type="text" name="name_task" value='.$name.'>';
                echo '</br>';
                echo '<textarea name="content_task" cols="30" rows="10">'.$content.'</textarea>';
                echo '</br>';
                echo '<input type="date" name="date_task" value='.$date.'>';
                echo '</br>';
                echo '<input type="submit" value="modify" name="modify">';
                echo '</br>';
                echo '</form> ';
            }

        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

// modify task
    function modifyTask($bdd,$id):void{
        try {
            $req = $bdd->prepare('UPDATE task 
            SET name_task= :name_task, content_task= :content_task,date_task= :date_task
            WHERE id_task=:id_task');
            $req->execute(array(
                'name_task' => $this->getName(),
                'content_task' => $this->getContent(),
                'date_task' => $this->getDate(),
                'id_task' => $id
            ));

        }  catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

// delete task
    function deleteTask($bdd,$id):void{
        try {
            $req = $bdd->prepare('DELETE FROM task WHERE id_task=:id_task');
            $req->execute(array(
                'id_task' => $id
            ));
        }  catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }

    }



}







?>