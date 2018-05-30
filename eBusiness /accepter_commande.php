<?php
session_start ();
require ("db_config.php");

try
{
  $statut_acceptee="acceptee";
  $statut_refusee="refusee";

$bdd = new PDO("mysql:host=$host; dbname=$data",$utilisateur,$mot_de_passe); 
 
$reponse = $bdd->query("SELECT p.uid,c.cmdid ,p.nom, p.description, c.qte,p.prix FROM commande c INNER JOIN produits p on c.pid=p.pid WHERE p.uid=' ".$_SESSION['uid_vendeur']." '");

  //récupération de la variable d'URL, pour manipuler le produit selectionné

if (isset($_GET['idC']) AND isset($_GET['idP'])) {
$commande_id=$_GET["idC"];
$produit_id=$_GET["idP"];
}


// on recupere la quantité initiale du produit 

$res = $bdd->query("SELECT qte FROM produits WHERE pid='".$produit_id."'");
$donnees = $res->fetch();
$qte_initiale=$donnees['qte'];
// on recupere la quantité commandée 

$res2 = $bdd->query("SELECT qte FROM commande WHERE cmdid=' ".$commande_id." '");
$donnees2 = $res2->fetch();
$qte_commandee=$donnees2['qte'];

// soustraire la quantité commandée de la quantitée initiale 

$reponse2=$bdd->prepare("UPDATE produits
SET qte = :qte
WHERE pid = ' ".$produit_id." '");

$qte_restante=$qte_initiale-$qte_commandee;
if($qte_initiale>=$qte_commandee){
$reponse2-> execute(array(
    'qte' => $qte_restante
    ));
}
if($qte_initiale>=$qte_commandee){
 // on modifie le champ 'statut' de la table commande si la quantité du produit est supérieure ou egale a la quantité commandée 
  $reponse=$bdd->prepare("UPDATE commande
SET statut = :statut
WHERE cmdid = ' ".$commande_id." '");
$reponse-> execute(array(
    'statut' => $statut_acceptee
    ));}else{
   $reponse=$bdd->prepare("UPDATE commande
SET statut = :statut
WHERE cmdid = ' ".$commande_id." '");
$reponse-> execute(array(
    'statut' => $statut_refusee
  ));}

  if($reponse && $reponse2 && $qte_initiale>=$qte_commandee)
  {
    echo('<script type="text/javascript">
    alert("Commande acceptee");
    document.location.href = "liste_commande2.php";
</script>');
  }
  else
  {

    echo('<script type="text/javascript">
    alert("Impossible daccepter la commande, votre stock est inférieur à la quantité de commande reçue et sera automatiquement refusée");
    document.location.href = "liste_commande2.php";
</script>');
  }
  }
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>