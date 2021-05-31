
<?php
class MonPdo
{

private static $serveur='mysql:host=localhost';
private static $bdd='dbname=surletas'; 
private static $user='root' ; 
private static $mdp='' ;
private static $monPdo;
private static $unPdo = null;

//	Constructeur privé, crée l'instance de PDO qui sera sollicitée
//	pour toutes les méthodes de la classe
private function __construct()
{
    MonPdo::$unPdo = new PDO(MonPdo::$serveur.';'.MonPdo::$bdd, MonPdo::$user, MonPdo::$mdp);
    MonPdo::$unPdo->query("SET CHARACTER SET utf8");
    MonPdo::$unPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
public function __destruct()
{ 
    MonPdo::$unPdo = null;
}
/**
*	Fonction statique qui cree l'unique instance de la classe
* Appel : $instanceMonPdo = MonPdo::getMonPdo();
*	@return l'unique objet de la classe MonPdo
*/
public static function getInstance()
{
    if(self::$unPdo == null)
    {
        self::$monPdo= new MonPdo();
    }
    return self::$unPdo;
}

}
 
/*
$adssmail= "loubnadamri12@gmail.com";

   function recurpidClient($adssmail){
  	var_dump($adssmail);
        $req=MonPdo::getInstance()->prepare("select idClient from client where emailClient=:idClient");
        $req->execute(['idClient'=>$adssmail]);
        $leResultat=$req->fetchAll();
        var_dump($leResultat);
        return $leResultat;
    }
    recurpidClient($adssmail);
    echo "ok";*/
 
$recupCli=103;
        function taskClient($recupCli){   
        $req=MonPdo::getInstance()->prepare("select * from task where idClient=:recupCli") ;
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'task') ;
        $req->execute(['recupCli'=> $recupCli]); 
        $lesResulats=$req->fetchAll();
        var_dump($lesResulats);
        //return $lesResulats ;
    }
    var_dump($recupCli);
?>