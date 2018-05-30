
<?php
session_start ();
require ("db_config.php");
include ("verifier.php");

if (isset($_POST['qte'])) {
  $qte = verifier($_POST["qte"]);
} 
// heure et date de l'instant present
$date=date("Y-m-d H:i:s");
$statut="en_cours";
try {

	//inserser la commande 
	
$bd = new PDO("mysql:host=$host; dbname=$data",$utilisateur,$mot_de_passe); 
$res = $bd-> prepare("INSERT INTO commande (pid, uid, qte, date, statut) VALUES (:pid, :uid, :qte , :date, :statut)");
$res-> execute(array(

    'pid' => $_SESSION['pid'],

    'uid' => $_SESSION['uid_acheteur'],

    'qte' => $qte,

    'date' => $date,

    'statut' => $statut

    ));

echo('<script type="text/javascript">
    alert("Commande passée avec succès");
    document.location.href = "historique_commandes_acheteur.php";
</script>');
   


}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>