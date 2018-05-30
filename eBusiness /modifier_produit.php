
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
        <?php echo (" <H3> Selectionner un produit pour le modifier </H3>"); ?>
    </div>
<table class='table'>
	<tr>   <th>Nom</th><th>Description</th><th>Quantité</th><th>Prix</th> <th>Commander</th></tr>
	<?php
    // affichage des produit puis selectionner un pour le modifier 
try {
$db = new PDO( "mysql:host=$host;dbname=$data" , $utilisateur , $mot_de_passe);

$SQL="SELECT p.uid,p.pid,p.nom, p.description,p.qte,p.prix from produits p where p.uid=' ".$_SESSION['uid_vendeur']." '";
$res=$db->query($SQL);

while ($donnees = $res->fetch()){ 
    $_SESSION['pid']=$donnees['pid'];
    echo "</tr>";
    echo "<td> $donnees[nom] </td>";
    echo "<td> $donnees[description] </td>";
    echo "<td> $donnees[qte] </td>";
    echo "<td> $donnees[prix] </td>";
    echo ("<td> <a href='alter_table.php?idP=$donnees[pid]'>Selectionner</a></td>");
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