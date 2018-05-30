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

		<!-- ouverture de la session vendeur -->
	<?php 
	require("db_config.php");

	include ("menu_vendeur.php") ;
	include("clignotement.php");

	 ?>
	
<div class="contenu">
	<div class="right">
    <a href="deconnecte.php">Deconnexion</a>
  </div>

	<?php include("bouton_recherche_vendeur.php") ; ?>
	<div class="center">
		<?php echo (" <H3> Bienvenue sur votre compte Vendeur : " .$_SESSION['nom_vendeur']." ! </H3>"); ?>
	</div>
	<div class="center">   
		<?php 
		try{
    $bdd = new PDO("mysql:host=$host; dbname=$data",$utilisateur,$mot_de_passe);     
    
$reponse = $bdd->query("SELECT p.uid,p.pid,c.cmdid ,p.nom, p.description, c.qte,c.statut,p.prix FROM commande c INNER JOIN produits p on c.pid=p.pid WHERE c.statut='en_cours' AND p.uid=' ".$_SESSION['uid_vendeur']." ' ");

while ($donnees = $reponse->fetch()){ 


}
$nb_commande=$reponse->rowCount();
if ($nb_commande>0) echo"<div class='center' id='DivClignotante' style='visibility:visible;color:blue' > <h4>Vous avez $nb_commande commandes à traiter </h4> </div>";
$reponse->closeCursor();
} 
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}?>

	
<div class="center">    
  <h3>Categories Populaires</h3><br>
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

