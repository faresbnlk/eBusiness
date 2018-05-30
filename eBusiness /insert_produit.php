<?php

session_start();

require ("db_config.php");


include ("verifier.php");
if (isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['qte'])&& isset($_POST['prix']) && isset($_POST['categorie']) ) {
  $nom = verifier($_POST["nom"]);
  $description= verifier($_POST["description"]);
  $qte = verifier($_POST["qte"]);
  $prix = verifier($_POST["prix"]);
  $categorie= verifier($_POST["categorie"]);
}
$uid=$_SESSION['uid_vendeur'];
// detecter la categorie pour inserer son identifiant 
function categorie_id($categorie){
	if($categorie=="Alimentaire"){return 1;}elseif ($categorie=="Vetements") { return 2;}else{return 3;}
}

try {

// inserer le produit 
$categorie_id_p=categorie_id($categorie);
$db = new PDO( "mysql:host=$host;dbname=$data" , $utilisateur , $mot_de_passe);

$res = $db -> prepare("INSERT INTO produits (nom, description, qte, prix, uid, ctid) VALUES (:nom, :description, :qte , :prix, :uid, :ctid)");
$res-> execute(array(

    'nom' => $nom,

    'description' => $description,

    'qte' => $qte,

    'prix' => $prix,

    'uid' => $uid,

    'ctid' => $categorie_id_p

    ));

echo('<script type="text/javascript">
    alert("Produit Ajouté avec succès");
    document.location.href = "liste_produits_du_vendeur.php";
</script>');




}
catch(PDOException $e)
{
exit("Erreur de connexion" .$e->getMessage());
}

  ?>