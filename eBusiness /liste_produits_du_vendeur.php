<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include("header.php"); ?>
	<title></title>
	<style>
		<?php
		include ("style_final.css");
		?>
	</style>
	 
</head>
<body>

<?php
include("menu_vendeur.php");
require ("db_config.php"); ?>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
	<div class="right">
    <a href="deconnecte.php">Deconnexion</a>
  </div>
		<?php include("bouton_recherche_vendeur.php") ; ?>
		<div class="center">
		<?php echo (" <H3> Liste de Mes Produits </H3>"); ?>
	</div>
<!-- on affiche les produits par vendeurs avec possubilité d'envoyer la commande -->

<table class='table'>
        <tr>
        <td>Produit</td>
        <td>Description</td>
        <td>Quantité restante</td>
        <td>Prix</td>
        <br>
        </tr> 
	<?php
try {
$db = new PDO( "mysql:host=$host;dbname=$data" , $utilisateur , $mot_de_passe);

$SQL="SELECT p.pid,p.nom,p.description, p.qte,p.prix from produits p inner join users u on p.uid=u.uid where u.uid='".$_SESSION['uid_vendeur']."'";
$res=$db->query($SQL);

/* si la quantité du produit est supérieure à 0 alors on affiche "selectionner" sinon "epuisé" pour signifier l'epuisement du stock */

while ($donnees = $res->fetch()){ 
	 
echo ("<tr><td>$donnees[nom]</td><td>$donnees[description]</td><td>$donnees[qte]</td><td>$donnees[prix]</td>");
}
$res->closeCursor();
 ?>

</table>
</form>


<?php

}
catch(PDOException $e)
{
exit("Erreur de connexion" .$e->getMessage());
}
?>

</div>

</body>
</html>