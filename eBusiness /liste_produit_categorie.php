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
<script language="javascript">
     function confirme( identifiant ) {
	  document.location.href = "select_qte.php?idP="+identifiant ;
      }
	</script> 
<?php
include("menu_acheteur.php");
require ("db_config.php"); ?>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
	<div class="right">
    <a href="deconnecte.php">Deconnexion</a>
  </div>
	<?php include("bouton_recherche_acheteur.php") ; ?>
	<div class="center">
		<?php echo (" <H3> Liste des produits par Categories </H3>"); ?>
	</div>
<table class='table'>
	<tr>   <th>Categorie</th><th>Nom</th><th>Description</th><th>Quantité</th><th>Prix</th> <th>Commander</th></tr>
	<?php
try {
$db = new PDO( "mysql:host=$host;dbname=$data" , $utilisateur , $mot_de_passe);
 /* on affiche les produit par Categorie */
$SQL="SELECT c.nom,p.pid,p.nom, p.description,p.qte,p.prix from produits p inner join categories c on p.ctid=c.ctid order by c.ctid";
$res=$db->query($SQL);

while ($donnees = $res->fetch()){ 
    $idProduit=$donnees['pid'];

    echo "</tr>";
    echo "<td> $donnees[0] </td>";
    echo "<td> $donnees[nom] </td>";
    echo "<td> $donnees[description] </td>";
    echo "<td> $donnees[qte] </td>";
    echo "<td> $donnees[prix] </td>";
    if($donnees['qte']>0){
    echo ("<td> <a href=\"#\" onClick=\"confirme('".$idProduit."')\">Selectionner</a></td>");
        }else{echo("<td>Produit Epuisé </td>");}
        echo "</tr>";
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