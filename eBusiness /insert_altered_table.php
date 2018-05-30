<?php
session_start ();
require ("db_config.php");
include ("verifier.php");

if (isset($_POST['description']) && isset($_POST['qte'])&& isset($_POST['prix'])) {
  $description = verifier($_POST["description"]);
  $qte = verifier($_POST["qte"]);
  $prix = verifier($_POST["prix"]);
} 
// inserer les nouvelles information du produit 

try {
$bd = new PDO("mysql:host=$host; dbname=$data",$utilisateur,$mot_de_passe); 
$res = $bd-> prepare("UPDATE produits
SET description = :description,
  qte = :qte,
  prix = :prix
WHERE pid = ' ".$_SESSION['idP']." '");
$res-> execute(array(

    'description' => $description,

    'qte' => $qte,

    'prix' => $prix

    ));

 echo('<script type="text/javascript">
    alert("Modification réussie !");
    document.location.href = "liste_produits_du_vendeur.php";
</script>');
   

echo($_SESSION['pid']); echo"<br>";

echo($_SESSION['uid']);


}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
