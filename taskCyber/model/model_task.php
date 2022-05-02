<?php

class Task{
    
// attribut
private $id;
private $name;
private $content;
private $date;


// constructor
public function __constructor($name,$content,$date,$validate){
    $this->name = $name;
    $this->content = $content;
    $this->date = $date;
    $this->validate = $validate;
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
public function getValidate():string{
    return $this->validate_task;
}



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
public function setValidate($validate):void{
    $this->validate_task = $validate;
}

// methode
function  createTask($bdd){
    try {
        $req = $bdd->prepare('INSERT INTO task(name_task, content_task, date_task,validate_task) 
        VALUES(name_task= :name_task, content_task= :content_task,date_task= :date_task, validate_task =:validate_task)');
        $req->execute(array(
            ':name_task'=> $this->name,
            ':content_task'=> $this->content,
            ':date_task'=> $this->date,
            'validate_task'=> $this->validate
        ));
    } catch (Exception $e) {
        die('Erreur :' .$e->getMessage());
    }
}
}

?>