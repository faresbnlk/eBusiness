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
include("menu_vendeur.php");
require ("db_config.php"); 
include("verifier.php");
?>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
	<div class="right">
    <a href="deconnecte.php">Deconnexion</a>
  </div>
<?php include("bouton_recherche_vendeur.php") ; ?>
<div class='center' >
<h3> Les résultats correspondants à votre recherche sont: </h3>
</div>
<table class="table">
	<tr><th>Numéro</th><th>Nom</th><th>Description</th><th>Quantité</th><th>Prix</th></tr>
	<?php
	$recherche="";
	if(isset($_POST["recherche"])){
		$recherche=verifier($_POST["recherche"]);
	}

try {
$db = new PDO( "mysql:host=$host;dbname=$data" , $utilisateur , $mot_de_passe);

$SQL="SELECT pid,nom,description,qte,prix from produits where nom like '%$recherche%' OR description like '%$recherche%'";
$res = $db->query($SQL);

while ($donnees = $res->fetch()){ 
    $idProduit=$donnees['pid'];

    echo "</tr>";
    echo "<td> $donnees[pid] </td>";
    echo "<td> $donnees[nom] </td>";
    echo "<td> $donnees[description] </td>";
    echo "<td> $donnees[qte] </td>";
    echo "<td> $donnees[prix] </td>";

}
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