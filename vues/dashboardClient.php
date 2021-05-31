
<?php
if(isset($_SESSION["autorisation"]) and $_SESSION["autorisation"]=="OK"){
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sur le tas - Tableau de bord</title>
   <link rel="icon" href="img/favicon.ico" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    
    <link rel="stylesheet" href=" css/style.css">
   <link rel="stylesheet" href="css/dashboard/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
 </head>


   <div class="menu-btn">
     <i class="fas fa-bars"></i>
   </div>
   <div class="side-bar">
     <div class="close-btn">
       <i class="fas fa-times"></i>
     </div>
     <div class="menu ">
      <div class="elem_center"><img src="img/logo_Surletas_b.png" width="30%"></div>
       <div class="item active"><a href="index.php?uc=client&choix=bienvenu"><i class="fas fa-desktop"></i>Tableau de bord </a></div>
       <div class="item">
         <a class="sub-btn"><i class="fas fa-tasks "></i>Projets<i class="fas fa-angle-right dropdown"></i></a>
         <div class="sub-menu">
           <a href="index.php?uc=client&choix=showTask" class="sub-item">Afficher</a>
           <a href="index.php?uc=client&choix=addTask" class="sub-item">Ajouter </a>
           <a href="index.php?uc=client&choix=listEditTask"class="sub-item">Modifier</a>
           <a href="index.php?uc=client&choix=listDeleteTask" class="sub-item">Supprimer</a>
         </div>
       </div>
       <div class="item">
         <a class="sub-btn"><i class="fas fa-envelope"></i>Messages<i class="fas fa-angle-right dropdown"></i></a>
         <div class="sub-menu">
           <a href="#" class="sub-item">Messgae reçu</a>
           <a href="#" class="sub-item">Chat</a>
         </div>
       </div>
       <div class="item"><a href="index.php?uc=client&choix=showProfil"><i class="fas fa-user"></i>Profil</a></div>
       <div class="item"><a href="#"><i class="fas fa-cog"></i>Paramétre</a></div>
       <div class="item"><a href="index.php?uc=client&choix=deconnexion"><i class="fas fa-power-off"></i>Déconnexion</a></div>
     </div>
   </div>
   <section class="top_db"> 
<div class="container">
  <div class="row">
  <div class="col-md-8"><h1 class="title1 dis_center my-5">Bienvenu dans le tableau de bord  </h1> </div>
  <div class="col-md-4">
    <button class="btn btn-ouf-tas_color my-5" ><a href="index.php?uc=client&choix=deconnexion"><i class="fas fa-power-off"></i>Déconnexion</a></button>
  </div>
</div>
<div class="row  pb-5">
<div class="dis_center">
  <div class=" card col bg-bleu">
    <div class="card-body">
    <i class="fas fa-user white"></i> 
    <p class="white">Nom et Prénom: </br> <span class="bold">
      <?php foreach($clients as $client)
        { echo  $client->getLastNameClient(). " " .$client->getFirstNameClient();
      } ?> </span>
    </p></div>
    </div>

  <div class="card col bg-red">
    <div class="card-body">
    <i class="fas fa-tasks white"></i>
    <p class="white">Nombre des projets:</br> <span class="bold">
    <?php echo $nbTask ;?> </span></p>
  </div>
  </div>

  <div class="card col bg-orang">
    <div class="card-body">
    <i class="fas fa-envelope white"></i>
    <p class="white">Nombre des Messages:</br> <span class="bold"> 0 </span></p>
  </div></div>

</div>
</div>


</div>
   </section>
   <section class="main">
    <div class="container">

      
<div class="bg_white">     
  <div class="row">
 <div class="col-md-12 ">
<h4 class="tas_color"> liste des projets</h4>
      
    </div>
</div>
<div class="row">
 <div class="col-md-12">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre </th>
      <th scope="col">Description </th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
 <?php 
      foreach($tasks as $task)
        {
        echo "
    <tr>
      <th scope='row'>".$task->getIdTask() ."</th>
      <td>".$task->getNameTask() ."</td>
      <td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target= '#exampleModal".$task->getIdTask() ."'>
  <i class='fas fa-eye'></i>
</button> </td>

      <td>".$task->getDateTask() ."</td>
      <td>".$task->getStatusTask() ." &nbsp;<i class='fas fa-circle color-att'></i></td>
    </tr>
<div class='modal fade' id='exampleModal".$task->getIdTask() ."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel".$task->getIdTask() ."'>".$task->getNameTask() ."</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
       ".$task->getTopicTask() ."
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fermer</button>
      </div>
    </div>
  </div>
</div>";
    }  ?>
  </tbody>
</table>



</div>
</div>
</div>
</div>
   </section>

   <script type="text/javascript" src="js/script.js"></script>

 </body>
</html>
      <?php
}
  ?>