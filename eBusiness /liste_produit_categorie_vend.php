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
	
<?php include("bouton_recherche_vendeur.php") ; ?>
<div class="center">
		<?php echo (" <H3> Liste des produits par Categories </H3>"); ?>
	</div>
	<?php
	/* affichage des produit selon le la categorie */
try {
$db = new PDO( "mysql:host=$host;dbname=$data" , $utilisateur , $mot_de_passe);

$SQL="SELECT c.nom,p.nom, p.qte,p.prix from produits p inner join categories c on p.ctid=c.ctid order by c.ctid";
$res=$db->query($SQL); ?>
<form action="ajout_commande.php" method="post">
<?php
echo "<table class='table'>";
        echo "<tr>
        <td>Categorie</td>
        <td>Produit</td>
        <td>Quantité restante</td>
        <td>Prix</td>
        <br>
        </tr>"; 


foreach($res as $row) {

echo "<tr><td>$row[0]</td><td>$row[nom]</td><td>$row[qte]</td><td>$row[prix]</td>" ?> <?php echo"</tr>";
} ?>

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
