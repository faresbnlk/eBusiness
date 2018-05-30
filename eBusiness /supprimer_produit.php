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
    <script language="javascript">
     function confirme( identifiant ) {
        var confirmation = confirm( "Voulez vous vraiment supprimer cet enregistrement ?" ) ;
  if( confirmation )
  {
    document.location.href = "confirmer_supression.php?idP="+identifiant ;
  }
      }
  </script> 
<?php 
require("db_config.php");
include("menu_vendeur.php");   ?>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<?php include("bouton_recherche_vendeur.php") ; ?>
<div class="center">
    <?php echo (" <H3> Liste des produits à supprimer </H3>"); ?>
  </div>
  <div class="center">   
<table class='table'>
  <tr>   <th>Nom</th><th>Description</th><th>Quantité</th><th>Prix</th> <th>Suppression</th></tr>
  <?php
  // affichage des produits avec lien supprimer 
try
{
    $bdd = new PDO("mysql:host=$host; dbname=$data",$utilisateur,$mot_de_passe);     

$reponse = $bdd->query("SELECT pid ,nom, description, qte,prix FROM produits WHERE uid =' ".$_SESSION['uid_vendeur']." ' ");

while ($donnees = $reponse->fetch()){ 
    $idProduit=$donnees['pid'];
  
    echo "</tr>";
    echo "<td> $donnees[nom] </td>";
    echo "<td> $donnees[description] </td>";
    echo "<td> $donnees[qte] </td>";
    echo "<td> $donnees[prix] </td>";
    echo ("<td> <a href=\"#\" onClick=\"confirme('".$idProduit."')\">supprimer</a></td>");
    echo "</tr>";    }
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