<?php   include("vues/header.php"); ?>
<section id="slider"><!-- slider  -->
  <div class="container-fluid">
    <div class="row bg-black  block_slide">
      <div class="col-lg-6 w-100">
        <div class="title"> 

          <h1 class="txt-white"> Exprimer votre besoin <i class="fas fa-pen-alt tas_color"></i></h1>
          <h2 class="tas_color  my-3 "> On s'occupe du reste</h2>
        </div>
        
      </div>

    </div>
  </div>
</section> <!-- fin slider -->

<section id="form projet">
<div class="dis_center">
  <form class="bg_white"  method="POST" action="index.php?uc=task&action=valideTask" enctype='multipart/form-data'>
    <div class="mb-3">
      <label for="formGroupExampleInput" class="form-label">Nom du Projet</label>
      <input type="text" class="form-control" id="formGroupExampleInput" required="required"  placeholder="Projet..." name="nameTask">
    </div>

    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Parlez-nous de votre projet</label>
      <textarea class="form-control" required="required" id="exampleFormControlTextarea1" rows="3" name="topicTask"></textarea>
    </div>

    <div class="mb-3">
      <label for="formFile" class="form-label">Document joint </label>

      <input class="form-control"  type="file" id="formFile" name="docTask">
    </div>
     <div class="mb-3 col-md-12">
      <label  class="form-label">Domaine du projet</label>
      <select class="form-select" aria-label="Default select example" required="required"   name="nameCat">
      <option selected >Sélectionné</option>
      <?php 
      foreach($categories as $categorie)
        {
      echo "<option value='".$categorie->getIdCat() . "'>".$categorie->getNameCat() ."</option>";
       } 
      ?>
    </select>
    </div>  

    <div class="mb-3 col-md-12">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" required="required" id="inputEmail4" name="emailClient">
  </div>
  <div class="mb-3 col-md-12">
    <label for="inputPassword4" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" required="required" id="inputPassword4" name="mdpClient">
  </div>
        <div class="mb-3 row">
  <div class="col-md-6">
    <label for="" class="form-label">Nom</label>
    <input type="text" class="form-control" required="required" id="lastName" name="lastNameClient">
  </div>

  <div class="mb-3 col-md-6">
    <label for="" class="form-label">Prénom</label>
    <input type="text" class="form-control" required="required" id="firstName" name="firstNameClient">
  </div>
              <div class="mb-3 col-md-6">
    <label for="" class="form-label">Téléphone</label>
    <input type="tel" class="form-control" required="required" id="phone"   name="phoneClient">
  </div>
</div>
  <div class="mb-3  col-12">
    <label for="inputAddress" class="form-label">Adresse</label>
    <input type="text" class="form-control" required="required" id="inputAddress" placeholder="12 rue..." name="adressClient">
  </div>
  <div class="mb-3 row">
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Pays</label>
    <input type="text" class="form-control" required="required" id="inputCounrty" name="countryClient">
  </div>

  <div class="mb-3 col-md-6">
    <label for="inputZip" class="form-label">Ville</label>
    <input type="text" class="form-control" required="required" id="inputCity" name="cityClient">
  </div>
</div>
  <div class="mb-3 col-12">
    <button type="submit" class="btn btn-tas_color">Envoyer</button>
  </div>

  </form>
  </div>
</section>




