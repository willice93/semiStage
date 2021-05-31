
<?php 
session_start();

?>

    

    <div class="row text-center">
        
	<?php 
    /*connexion de la base de donnée*/
   include "entete.php";
/* 
    $bdd=connect();*/
    /*les requêts*/
    $sql="select * from destination";

    /*execution des requêts*/
    $resultat=$bdd->query($sql);
    ?>
<h1 class="text-center m-5">Nous vous proposons les destinations suivantes</h1>
<?php 
    /*affichage du resulat*/
    while ($destination=$resultat->fetch(PDO::FETCH_OBJ)) {
echo "<div class='col'>
  <div class='card m-3' style='width: 18rem;'>
  <img class='card-img-top' src='images/".$destination->photo."'' alt='Card image cap'>
  <div class='card-body'>
    <h5 class='card-title'>".$destination->libelle."</h5>
    <a href='sejour.php?elem_destina=". $destination->code . "'  class='btn btn-primary'>Voir le séjour</a>
  </div>
</div></div>
" ;
    }

	?>	
</div> </div>	
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script type="text/javascript" href="js/bootstrap-auto-dismiss-alert.js"></script> 
</body>
</html>