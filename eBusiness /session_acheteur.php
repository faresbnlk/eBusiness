<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<?php include("header.php"); ?>
	<title>Welcome to your account </title>
	<style> 
	<?php
	include("style_final.css");

	 ?>


	 </style>
</head>
<body>
	<!-- ouverture de la session acheteur -->
	
	<?php include ("menu_acheteur.php") ; ?>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
	
	<?php include("bouton_recherche_acheteur.php") ; ?>
	<div class="center">
		<?php echo (" <H2> Bienvenue sur votre compte Acheteur : " .$_SESSION['nom_acheteur']." ! </H2><br><br>"); ?>
	</div>
	<div class="center">    
  <h4>Categories Populaires</h4><br>
  <div class="row">
    <div class="col-sm-4">
      <img src="alimentaire.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p>Alimentaire</p>
    </div>
    <div class="col-sm-4"> 
      <img src="vetements2.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p>Vetements</p>    
    </div>
    <div class="col-sm-4"> 
      <img src="jouets.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p>Jouets</p>    
    </div>
	</div>
</div>
</div>


</body>
</html>

?>