<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();

?>

<!DOCTYPE html>
<html>
<head>
<style> 
<?php
include("style_final.css");

?>
</style>
</head>
<body>
<?php 
require("db_config.php");
include("menu_vendeur.php");   ?>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <?php include("bouton_recherche_vendeur.php") ; ?>
<table class='table'>
  <tr><th>Nom</th><th>Description</th> <th>Quantité</th><th>Prix Unit</th><th>Prix Total</th><th>Statut</th></tr>
  <?php
try
{
    $bdd = new PDO("mysql:host=$host; dbname=$data",$utilisateur,$mot_de_passe);     
   
$reponse = $bdd->query("SELECT p.uid,c.cmdid ,p.nom, p.description, c.qte,p.prix,c.statut FROM commande c INNER JOIN produits p on c.pid=p.pid WHERE c.statut='refusee' AND p.uid=' ".$_SESSION['uid_vendeur']." ' ");


while ($donnees = $reponse->fetch()){ 
   $prix_total=$donnees['qte']*$donnees['prix'];
 
    echo "</tr>";
    echo "<td> $donnees[nom] </td>";
    echo "<td> $donnees[description] </td>";
    echo "<td> $donnees[qte] </td>";
    echo "<td> $donnees[prix] </td>";
    echo "<td> $prix_total </td>";
    echo "<td> $donnees[statut] </td>";
    echo "</tr>";    }
    $nb_commande=$reponse->rowCount();
    echo"<div class='center' > <h4>Vous avez refusé $nb_commande commandes </h4> </div>";
$reponse->closeCursor();
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
</table>
</div>
</body>
</html>