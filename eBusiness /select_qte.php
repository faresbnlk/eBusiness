<?php
session_start ();

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
  <?php
    include ("style_final.css");
    ?>
  </style>
</head>
<body>
  <?php
 require ("db_config.php");
  include("menu_acheteur.php");  ?>
   <script>
  function myFunction(val) {
   
    document.getElementById("demo").innerHTML = "Le prix Total de la Commande est de:  "+val;
}
</script>

<div style='margin-left:25%;padding:1px 16px;height:1000px;'>
  <?php include("bouton_recherche_acheteur.php") ; ?>
  <div class="center">
    <?php echo (" <H3> Selectionner la quantité à commander </H3>"); ?>
  </div>

  <table class='table'>
 <tr><td>Nom</td><td>description</td><td>prix unitaire</td></tr>
<?php
try
{
  //recuperer la variable d'url pour identifier le produit 

$bdd = new PDO("mysql:host=$host; dbname=$data",$utilisateur,$mot_de_passe); 
//$res = $bdd->query("SELECT pid ,nom, description, qte,prix FROM produits WHERE uid =' ".$_SESSION['uid_vendeur']." ' ");
$produit_id=$_GET["idP"];
$_SESSION['pid']=$produit_id;

  $res=$bdd->query("SELECT * FROM produits WHERE pid ='".$produit_id."' ");

  $donnees = $res->fetch();
 
  
  //afficher les infos du produit selectionné et puis taper la quantité voulue 

  echo"<tr><td>$donnees[nom]</td><td>$donnees[description]</td><td>$donnees[prix]</td></tr>";
  echo("</table>");
  echo "<br><br>";
  echo "<div class='center'>";
  echo("<form action='insert_commande.php' method='POST'>");
  echo("<input type='number' id='qte' name='qte' min='1' max='$donnees[qte]' oninput='myFunction(this.value*$donnees[prix])'>");
 echo"<h4 id='demo'></h4>";
  echo"<button class='btn btn-outline-primary' type='submit'>Envoyer la Commande</button>";
  echo "</form>";
echo "</div>";

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>

</body>
</html>