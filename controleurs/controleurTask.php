<?php
$action=$_GET["action"] ;
require_once "modeles/Client.class.php" ;
require_once "modeles/Categorie.class.php" ;
switch($action)
{
// page de formulaire 
    case "posTask" :
        $categories=categorie::insertCat();
		include ("vues/postTask.php") ;
		break ;
    case "taskOk":
        include ("vues/taskOk.php");
        break ;

// insertion de la task et du client avec verification de lieuhtenticité de l'email et sa fiabilité 
    case "valideTask" :
        $client=new client() ; 
        if (filter_var($_POST["emailClient"], FILTER_VALIDATE_EMAIL))  
         {
            $client->setEmailClient(secure($_POST["emailClient"])) ;
        }
        else{
            echo "L'email n'est pas valide";
            include ("vues/postTask.php") ;
        }
        $client->setMdpClient(md5(secure($_POST["mdpClient"]))) ;
        $client->setLastNameClient(secure($_POST["lastNameClient"])) ;
        $client->setFirstNameClient(secure($_POST["firstNameClient"])) ;
        $client->setAdressClient(secure($_POST["adressClient"])) ;
        $client->setPhoneClient(secure($_POST["phoneClient"])) ;
        $client->setCountryClient(secure($_POST["countryClient"])) ;
        $client->setCityClient(secure($_POST["cityClient"])) ;
        $task= new task() ;
        $task->setNameTask(secure($_POST["nameTask"])) ;
        $task->setTopicTask(secure($_POST["topicTask"])) ;
        $task->setDocTask(basename($_FILES["docTask"]["name"])) ; 
        $name_doc = basename($_FILES["docTask"]['name']);
        $chemin_destination = 'doc/' . $name_doc;
        move_uploaded_file($_FILES['docTask']['tmp_name'], $chemin_destination);
        $categorie=new categorie();
        $categorie->setNameCat(secure($_POST["nameCat"])) ;
        
        $rep=Client::exist(secure($_POST["emailClient"])) ; 
        if($rep==false){
            client::insertClient($client);
            task::add($task);
            header("Location:./?uc=task&action=taskOk");
        }
        else{
            include ("vues/mailExist.php") ;
        }
        break ;

        
}
