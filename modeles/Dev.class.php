<?php

class Dev {
    private $idDeveloper; 
    private $lastNameDeveloper; 
    private $firstNameDeveloper; 
    private $phoneDeveloper; 
    private $adressDeveloper; 
    private $emailDeveloper; 
    private $userNameDeveloper;
                
    function getIdDeveloper() {
        return $this->idDeveloper;
    }
    function getLastNameDeveloper(){
        return $this->lastNameDeveloper;
    }
    function getFirstNameDeveloper(){
        return $this->firstNameDeveloper;
    }
    function getPhoneDeveloper(){
        return $this->phoneDeveloper;
    }
    function getAdressDeveloper(){
        return $this->ladressDeveloper;
    }
    function getEmailDeveloper(){
        return $this->emailDeveloper;
    }
    function getUserNameDeveloper(){
        return $this->userNameDeveloper;
    }
    
    public static function findDeveloper($idDeveloper){
    $req=MonPdo::getInstance()->prepare("select * from developer where idDeveloper=:idDeveloper") ;
    $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'developer') ;
    $req->bindParam('idDeveloper', $idDeveloper);
    $req->execute();
    $leResultat=$req->fetch();
    return $leResultat ;
}
}