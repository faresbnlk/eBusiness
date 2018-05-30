<?php
session_start ();
require ("db_config.php");

try
{
  $statut="refusee";

$bdd = new PDO("mysql:host=$host; dbname=$data",$utilisateur,$mot_de_passe); 

$reponse = $bdd->query("SELECT p.uid,c.cmdid ,p.nom, p.description, c.qte,p.prix FROM commande c INNER JOIN produits p on c.pid=p.pid WHERE p.uid=' ".$_SESSION['uid_vendeur']." '");

 
$commande_id=$_GET["idC"];



  $reponse=$bdd->prepare("UPDATE commande
SET statut = :statut
WHERE cmdid = ' ".$commande_id." '");
$reponse-> execute(array(
    'statut' => $statut
    ));


  if($reponse)
  {
    echo('<script type="text/javascript">
    alert("Commande refusée");
    document.location.href = "commande_refusees.php";
</script>');
  }
  }
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>