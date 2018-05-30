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
  <script language="javascript">
    /* fonction qui nous permet d'accepter la commande, avec la variable d'url idC pour  selectionner la commande et la variable idP pour pouvoir identifier le produit et pouvoir gérer son stock */ 
     function accepter( idC,idP ) {
        var confirmation = confirm( "Voulez vous vraiment accepter la commande ?" ) ;
  if( confirmation )
  {
    document.location.href = "accepter_commande.php?idC="+idC+"&idP="+idP ;
  }
      }
  </script> 
    <script language="javascript">
        /* fonction qui nous permet de refuser la commande, avec la variable d'url idC pour  selectionner la commande */ 
     function refuser( idC) {
        var confirmation = confirm( "Voulez vous vraiment refuser la commande?" ) ;
  if( confirmation )
  {
    document.location.href = "refuser_commande.php?idC="+idC ;
  }
      }
  </script> 
<div style="margin-left:25%;padding:1px 16px;height:1000px;">

 <?php include("bouton_recherche_vendeur.php") ; ?>

<table class='table'>
  <tr><th>Commande</th><th>Nom</th><th>Description</th> <th>Quantité</th><th>Prix Unit</th><th>Prix Total</th><th>Accepter/Refuser</th></tr>
  <?php
try
{
    $bdd = new PDO("mysql:host=$host; dbname=$data",$utilisateur,$mot_de_passe);     
    
$reponse = $bdd->query("SELECT p.uid,p.pid,c.cmdid ,p.nom, p.description, c.qte,c.statut,p.prix FROM commande c INNER JOIN produits p on c.pid=p.pid WHERE p.uid='".$_SESSION['uid_vendeur']."' ");

while ($donnees = $reponse->fetch()){ 
     $idCommande=$donnees['cmdid'];
     $idProduit=$donnees['pid'];
     $stat=$donnees['statut'];
     $prix_total=$donnees['qte']*$donnees['prix'];


    // afficher les commandes recues avec possibilitées d'accepter ou de refuser, et si elle est deja traitée on affiche "traitée" 
    echo "</tr>";
    echo "<td> $donnees[cmdid] </td>";
    echo "<td> $donnees[nom] </td>";
    echo "<td> $donnees[description] </td>";
    echo "<td> $donnees[qte] </td>";
    echo "<td> $donnees[prix] </td>";
    echo "<td> $prix_total </td>";
    if($stat=='en_cours'){
    echo ("<td> <a href=\"#\" onClick=\"accepter('".$idCommande."','".$idProduit."')\">Accepter  </a><a href=\"#\" onClick=\"refuser('".$idCommande."')\">Refuser</a></td>");}else {echo ("<td> Traitée </td>"); }
    echo "</tr>";    }
     $nb_commande=$reponse->rowCount();
    echo"<div class='center' > <h4>Vous avez reçus $nb_commande commandes </h4> </div>";
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