<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		<?php
		include ("style_final.css");



		?>
	</style>
</head>
<body>

<?php
include("menu_acheteur.php");
require ("db_config.php"); ?>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
	<div class="right">
    <a href="deconnecte.php">Deconnexion</a>
  </div>
	  <?php include("bouton_recherche_acheteur.php") ; ?>
	  <div class="center">
	  	<h4> Historique de mes commandes </h4>
	  </div>
<table class='table'>
	<tr>   <th>Nom</th><th>Description</th><th>Quantité Commandée</th><th>Prix Total</th> <th>Statut</th></tr>
	<?php
try {
$db = new PDO( "mysql:host=$host;dbname=$data" , $utilisateur , $mot_de_passe);

$SQL="SELECT c.uid,p.nom, p.description,c.qte,p.prix,c.statut from commande c inner join produits p on c.pid=p.pid WHERE c.uid=' ".$_SESSION['uid_acheteur']." '";
$res=$db->query($SQL);

while ($donnees = $res->fetch()){ 
	$prix_total=$donnees['qte']*$donnees['prix'];
 
    echo "</tr>";
    echo "<td> $donnees[nom] </td>";
    echo "<td> $donnees[description] </td>";
    echo "<td> $donnees[qte] </td>";
    echo "<td> $prix_total</td>";
    echo "<td> $donnees[statut] </td>";
    echo "</tr>";    }
$res->closeCursor();


}
catch(PDOException $e)
{
exit("Erreur de connexion" .$e->getMessage());
}
?>
</table>
</div>


</body>
</html>