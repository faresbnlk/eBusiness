<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <?php include("header.php"); ?>
	<title></title>
	<style> 
<?php
include("style_final.css");
?>
</style>
</head>
<body>
	<?php include("menu_vendeur.php"); ?>
  <!-- affichage du formulaire qui nous permettrait de changer les informatiosn du produit selectionné -->
	<div style="margin-left:25%;padding:1px 16px;height:1000px;">
 
  <?php include("bouton_recherche_vendeur.php") ; ?>
<div class="center">
    <?php echo (" <H3> Saisissez les nouvelles informations du produit! </H3>"); ?>
  </div>
  <!-- possibilité de changer la description, la quantité et le prix du produit -->
<?php $_SESSION['idP']=$_GET["idP"]; ?>
<div class="center" style="margin-right: auto;margin-left: auto;">
    <form action="insert_altered_table.php?" method="post" style="width: 50%"> 
    <label for="description"><b>Description:</b></label>
    <input style="width: 50%" type="text" placeholder="Decrivez le produit" name="description"> <br>

    <label for="quantité"><b>Quantité:</b></label>
    <input type="number"  placeholder="Entrer la quantité" name="qte" min=1 required>

    <label for="prix"><b>Prix:</b></label>
    <input type="number" placeholder="Inserez le prix" name="prix" min=0 step="any" required><br>
     <button type="submit" class="btn btn-outline-primary">Modifier</button>
    <button type="reset" class="btn btn-outline-primary">Recommancer </button> 

 </form>   
</div>

</body>
</html>