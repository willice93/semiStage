<?php

class Client{
    public $idClient; 
    private $lastNameClient; 
    private $firstNameClient; 
    private $phoneClient; 
    private $adressClient; 
    private $countryClient;
    private $cityClient;
    private $emailClient; 
    private $mdpClient;
    private $dateClient;
    
//les getters 
    function getIdClient() {
        return $this->idClient;
    }
    function getLastNameClient(){
        return $this->lastNameClient;
    }
    function getFirstNameClient(){
        return $this->firstNameClient;
    }
    function getPhoneClient(){
        return $this->phoneClient;
    }
    function getAdressClient(){
        return $this->adressClient;
    }
     function getCountryClient(){
        return $this->countryClient;
    }
     function getCityClient(){
        return $this->cityClient;
    }
    function getEmailClient(){
        return $this->emailClient;
    }
    function getMdpClient(){
        return $this->mdpClient;
    }
     function getDateClient() {
        return $this->dateClient;
    }

// les setter
        function setIdClient($idClient){
        return $this->idClient=$idClient;
    }
    function setLastNameClient($lastNameClient){
        return $this->lastNameClient=$lastNameClient;
    }
    function setFirstNameClient($firstNameClient){
        return $this->firstNameClient=$firstNameClient;
    }
    function setPhoneClient($phoneClient){
        return $this->phoneClient=$phoneClient;
    }
     function setCountryClient($countryClient){
        return $this->countryClient=$countryClient;
    }
     function setCityClient($cityClient){
        return $this->cityClient=$cityClient;
    }
    function setEmailClient($emailClient){
        return $this->emailClient=$emailClient;
    }
    function setAdressClient($adressClient){
        return $this->adressClient=$adressClient;
    }
    function setMdpClient($mdpClient){
        return $this->mdpClient=$mdpClient;
    }
    function setDateClient($dateClient){
        return $this->dateClient=$dateClient;
    }


// les methodes 

    // methodes insertion client depuis le formulaire 
    public static function insertClient(client $client){
    $req=MonPdo::getInstance()->prepare("insert into client (lastNameClient, firstNameClient, phoneClient, adressClient, countryClient, cityClient, emailClient, mdpClient, dateClient) values (:lastNameClient, :firstNameClient, :phoneClient, :adressClient, :countryClient, :cityClient, :emailClient, :mdpClient, NOW()) ") ;
    $lastNameClient=$client->getLastNameClient() ;
    $req->bindParam('lastNameClient', $lastNameClient);
    
    $firstNameClient=$client->getFirstNameClient() ;
    $req->bindParam('firstNameClient', $firstNameClient);
    
    $phoneClient=$client->getPhoneClient() ;
    $req->bindParam('phoneClient', $phoneClient);
    
    $adressClient=$client->getAdressClient() ;
    $req->bindParam('adressClient', $adressClient);
    
    $countryClient=$client->getCountryClient() ;
    $req->bindParam('countryClient', $countryClient);
    
    $cityClient=$client->getCityClient() ;
    $req->bindParam('cityClient', $cityClient);
    
    $emailClient=$client->getEmailClient() ;
    $req->bindParam('emailClient', $emailClient);
    
    $mdpClient=$client->getMdpClient() ;
    $req->bindParam('mdpClient', $mdpClient);
    
    $req->execute();
        $_SESSION['alert']="le client a été ajouté !" ;
        return $_SESSION['alert'] ;
}

    // methode verification de connextion client 
    public static function check($emailClient, $mdpClient){
        $req=MonPdo::getInstance()->prepare("select * from client where emailClient =:emailClient and mdpClient=:mdpClient") ;
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'client');
        $req->bindParam('emailClient', $emailClient);
        $req->bindParam('mdpClient', $mdpClient);
        $req->execute();
        $leResultat=$req->fetchAll();
        $nb_lignes= count($leResultat) ;
        
        if ($nb_lignes==0) 
        {
        $rep= false;
        }
        else
        {
        $rep=true ;
        }        
        return $rep ;
       }

    // methode verification existance d'email Client 
    public static function exist($emailClient){
        $req=MonPdo::getInstance()->prepare("select idClient from client where emailClient =:emailClient ") ;
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'client') ;
        $req->bindParam('emailClient', $emailClient);
        $req->execute();
        $leResultat=$req->fetchAll();
        $nb_lignes= count($leResultat) ;
        
        if ($nb_lignes==0) 
        {
        $rep= false;
        }
        else
        {
        $rep=true ;
        }   
                
        return $rep ;
       }
       

    //methodes déconnexion client  
    public static function deconnect()
       {
           unset($_SESSION["autorisation"]) ;
           // if connexion btn deconnexion 
           
           // else se connecter 
       }

    //methode recuperation client  
    public static function recurpidClient($mail){
        $req=MonPdo::getInstance()->prepare("select idClient from client where emailClient=:idClient");
        $req->execute(['idClient'=>$mail]);
        $leResultat=$req->fetchAll();     
        $leResultat=(int)$leResultat[0][0];
        return $leResultat;
    }

    // affich info client
    public static function infoClient($idClient){
        $req=MonPdo::getInstance()->prepare("select * from client where idClient=:idClient");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'client') ;
        $req->execute(['idClient'=>$idClient]);
        $leResultat=$req->fetchAll();     
        return $leResultat;
    }


}
