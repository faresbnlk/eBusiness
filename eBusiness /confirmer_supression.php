<?php
session_start ();
require ("db_config.php");

try
{

$bdd = new PDO("mysql:host=$host; dbname=$data",$utilisateur,$mot_de_passe); 

$reponse = $bdd->query("SELECT pid ,nom, description, qte,prix FROM produits WHERE uid =' ".$_SESSION['uid_vendeur']." ' ");

  //récupération de la variable d'URL qui va nous permettre de savoir quel enregistrement supprimer:
$produit_id=$_GET["idP"];
  $requete=$bdd->query("DELETE  FROM produits WHERE pid ='".$produit_id."' ");
 
  if($requete)
  {
    echo"<script>alert(\"Suppression réussie ! \")</script>";
    include("supprimer_produit.php");
  }
  else
  {
    echo("La suppression à échouée") ;
  }
  }
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>