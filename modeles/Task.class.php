<?php
require_once "modeles/Client.class.php" ;
class Task{
    private $idTask; 
    private $docTask; 
    private $nameTask; 
    private $topicTask;
    private $idCat; 
    private $idClient; 
    private $statusTask;
    private $dateTask;
    private $validTask;
    private $priceTask;
    private $timeTask;

//les getters 
    function getIdTask() {
        return $this->idTask;
    }
     function getDocTask() {
        return $this->docTask;
    }
     function getNameTask() {
        return $this->nameTask;
    }
     function getTopicTask() {
        return $this->topicTask;
    }
    function getStatusTask() {
        return $this->statusTask;
    }
    function getDateTask() {
        return $this->dateTask;
    }

// les setters
    function setIdTask($idTask) {
        $this->idTask=$idTask;
    }
    function setDateTask($dateTask) {
        $this->dateTask=$dateTask;
    }
    function setStatusTask($statusTask) {
        $this->statusTask=$statusTask;
    }
     function setTopicTask($topicTask) {
        $this->topicTask=$topicTask;
    }
      function setDocTask($docTask) {
        $this->docTask=$docTask;
    }
      function setNameTask($nameTask) {
        $this->nameTask=$nameTask;
    }
    public function getIdCat() {
         return $this->idCat;
    }
     function setIdCat($idCat) {
        $this->idCat=$idCat;
    }

// les methodes

    // methode insertion des taches 
    public static function add(task $task)
    {
        $req=MonPdo::getInstance()->prepare("insert into task ( docTask, nameTask, topicTask, idCat, idClient, dateTask) values(:docTask, :nameTask, :topicTask,'" .  $_POST["nameCat"]. "', LAST_INSERT_ID(), NOW() )") ;
        $docTask=$task->getDocTask() ;
        $req->bindParam('docTask', $docTask);
        $nameTask=$task->getNameTask() ;
        $req->bindParam('nameTask', $nameTask);
        $topicTask=$task->getTopicTask() ;
        $req->bindParam('topicTask', $topicTask);
        $req->execute();
        $_SESSION['ajoute']="la tache a été ajouté !" ;
        return $_SESSION['ajoute'] ;
    }  

    // methode d'insertion des taches dans la compte client 
    public static function taskDbor (task $task)
    {
        $req=MonPdo::getInstance()->prepare("insert into task ( docTask, nameTask, topicTask, idCat, idClient, dateTask) values(:docTask, :nameTask, :topicTask,'" .$_POST["nameCat"]. "','".$_SESSION['client']."', NOW())");
        $docTask=$task->getDocTask() ;
        $req->bindParam('docTask', $docTask);
        $nameTask=$task->getNameTask() ;
        $req->bindParam('nameTask', $nameTask);
        $topicTask=$task->getTopicTask() ;
        $req->bindParam('topicTask', $topicTask);
        $req->execute();
        $_SESSION['ajout']="la tache a été ajouté !" ;  
        return $_SESSION['ajout'] ;
    }  

    // methode d'affichage des taches dans le tableau de bord client 
    public static function taskClient($idClient)
    {
        $req=MonPdo::getInstance()->prepare("select * from task where idClient=:idClient") ;
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'task') ;
        $req->execute(['idClient'=>$idClient]);
        $lesResulats=$req->fetchAll();
        return $lesResulats ;
    }

    //affichage des taches qui ont le même idClient
     public static function searshTask($idTask)
    {
    $req=MonPdo::getInstance()->prepare("select * from task where idTask=:idTask") ;
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'task') ;
    $req->execute(array(':idTask'=>$idTask));
    $leResultat=$req->fetch();
    return $leResultat ;

    }

    // modifer les tasks dans le tableau de bord client
    public static function editing(task $task)
    {  
        $req=MonPdo::getInstance()->prepare("update task set docTask=:docTask, nameTask=:nameTask, topicTask=:topicTask, idCat='".$_POST["nameCat"]."' where idTask=:idTask") ;
        $idTask=$task->getIdTask() ;
        $req->bindParam('idTask',$idTask) ;
        $docTask=$task->getDocTask() ;
        $req->bindParam('docTask', $docTask);
        $nameTask=$task->getNameTask() ;
        $req->bindParam('nameTask', $nameTask);
        $topicTask=$task->getTopicTask() ;
        $req->bindParam('topicTask', $topicTask);
        $nb=$req->execute();
        return $nb ;
    }

    // supprimer les task depuis le tableau de bord du client 
    public static function delete(task $task)
    {
        $req=MonPdo::getInstance()->prepare("delete from task where idTask=:idTask") ;
        $idTask=$task->getIdTask() ;
        $req->bindParam('idTask',$idTask) ;
        $nb=$req->execute();
        return $nb ;
    }

    public static function nbTask($idClient)
    {
        $req=MonPdo::getInstance()->prepare("select count(idTask) from `task` WHERE idClient=:idClient") ;
        
        $req->execute(['idClient'=>$idClient]);
        $lesResulats=$req->fetch();
        return $lesResulats[0] ;
        
    }
 


   
}
