<?php

class Categorie{
    private $idCat;
    private $nameCat;
    
    function getIdCat(){
        return $this->idCat;
    }
    function getNameCat(){
        return $this->nameCat;
    }
    /*les setter*/
    function setNameCat($nameCat){
        return $this->nameCat=$nameCat;
    }
  
  public static function insertCat(){
    $req=MonPdo::getInstance()->prepare("select * from categorie") ;
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'categorie') ;
   $req->execute();
    $lesResulats=$req->fetchAll();
    return $lesResulats ;
    
   
    }
  
}

