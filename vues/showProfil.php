 
<?php
if(isset($_SESSION["autorisation"]) and $_SESSION["autorisation"]=="OK"){
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sur le tas - Tableau de bord</title>
   <link rel="icon" href="img/favicon.png" />
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
     <div class="menu">
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
  <div class="col"><h1 class="title1 dis_center my-5">Modification de profil  </h1> </div>
  <div class="col">
    <button class="btn btn-ouf-tas_color my-5" ><a href="index.php?uc=client&choix=deconnexion"><i class="fas fa-power-off"></i>Déconnexion</a></button>
  </div>
   <section class="main">
<div class="container">

<div class="col">
  <?php 


      foreach($clients as $client)
        {
          echo "

    <ul>
      <li>Email: <span class='bold'> ".$client->getEmailClient()."</span></li>

      <li>Nom: <span class='bold'>".$client->getLastNameClient() ."</span></li>
      <li>Prénom: <span class='bold'>".$client->getLastNameClient()."</span></li>
      <li>Téléphone: <span class='bold'>".$client->getPhoneClient() ."</span></li>
      <li>Adresse: <span class='bold'>".$client->getAdressClient() ."</span></li>
      <li>Pays: <span class='bold'>".$client->getCountryClient()."</span></li>
      <li>Ville: <span class='bold'>".$client->getCityClient() ."</span></li>
    </ul>

 
   "; } ?>

</div>

</div>
 </section>

  <script type="text/javascript" src="js/script.js"></script>

 </body>
</html>
      <?php
}
  ?>