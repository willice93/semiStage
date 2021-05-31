<?php
if(isset($_GET["choix"])){
$choix=$_GET["choix"] ;

switch($choix)
{
// page de connexion client
    case "formConnect" :
		include "vues/clientForm.php" ;
		break;

// verification de connexion client
	case "verif":
	// recupe id client 
	$_SESSION['client']=client::recurpidClient($_POST["emailClient"]);
	// verification connection 
    	$rep=Client::check($_POST["emailClient"], md5($_POST["mdpClient"])) ; 
		if($rep==true){
			$_SESSION["autorisation"]="OK" ;
			$clients=client::infoClient($_SESSION['client']);
        	$tasks=task::taskClient($_SESSION['client']);
        	$nbTask= task::nbTask($_SESSION['client']);
			$tasks=task::taskClient($_SESSION['client']);
		  	include("vues/dashboardClient.php") ;
			}
			else
			{	
		    include("vues/echecConnect.php") ;
			}
		break ;
// deconnexion
	case "deconnexion":
		Client::deconnect() ;
		include "vues/accueil.php" ;
		break;
	// affichage des task dans le tableau de bord client
	case "bienvenu":

		$clients=client::infoClient($_SESSION['client']);
        $tasks=task::taskClient($_SESSION['client']);
        $nbTask= task::nbTask($_SESSION['client']);
        include ("vues/dashboardClient.php") ;
        break;

// affichage des task dans le tableau de bord client
	case "showTask":
        $tasks=task::taskClient($_SESSION['client']);
        include ("vues/showTask.php") ;
        break;

// page ajouter les tasks appartir du tableau de bord client
	case "addTask":
		$categories=categorie::insertCat();
		include "vues/addTask.php" ;
		break;

// ajouter les tasks appartir du tableau de bord client
	case "validAddTask":
		$task= new task() ;
        $task->setNameTask($_POST["nameTask"]) ;
        $task->setTopicTask($_POST["topicTask"]) ;
        $task->setDocTask(basename($_FILES["docTask"]["name"])) ; 
        $categorie=new categorie();
        $categorie->setNameCat($_POST["nameCat"]) ;
        $client=new client();
        $client->getIdClient($_SESSION['client']);
        task::taskDbor($task);
        $tasks=task::taskClient($_SESSION['client']);
        include ("vues/showTask.php");
		break;

// afficher les task a modifer 
		case 'listEditTask':
		$tasks=task::taskClient($_SESSION['client']);
        include ("vues/listEditTask.php") ;
        break;

//  modifier les tasks appartir du tableau de bord client
	case 'editTask':
		$categories=categorie::insertCat();
		$task=task::searshTask($_GET["idTask"]) ;
		include "vues/editTask.php" ;
		break;

// valider les modification sur la task 
	case "validEditTask":
		$task= new task() ;
		$task->setIdTask($_POST["idTask"]) ;
        $task->setNameTask($_POST["nameTask"]) ;
        $task->setTopicTask($_POST["topicTask"]) ;
        $task->setDocTask(basename($_FILES["docTask"]["name"])) ; 
        $categorie=new categorie();
        $categorie->setNameCat($_POST["nameCat"]) ;
        task::editing($task);
        $tasks=task::taskClient($_SESSION['client']);
        include ("vues/listEditTask.php");
		break;

// afficher les task a supprimer 
		case 'listDeleteTask':
		$tasks=task::taskClient($_SESSION['client']);
        include ("vues/listDeleteTask.php") ;
        break;

//  supprimer les tasks appartir du tableau de bord client
	case 'deleteTask':
		$task=task::searshTask($_GET["idTask"]) ;
		task::delete($task);
        $tasks=task::taskClient($_SESSION['client']);
		include "vues/listDeleteTask.php" ;
		break;

// modification profil client
		case'showProfil':
		$clients=client::infoClient($_SESSION['client']);
		include "vues/showProfil.php" ;
		break;

}
}