<!DOCTYPE html>
<html>
<head>
	<title>Ajouter Produit</title>
	<style>
		<?php
		include ("style_final.css");
		?>
	</style>
</head>
<body>
  <!-- affichage du formulaire pour l'ajout d'un produit -->
<?php include("menu_vendeur.php"); ?>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
	<div class="right">
    <a href="deconnecte.php">Deconnexion</a>
  </div>
  <?php include("bouton_recherche_vendeur.php") ; ?>
<h2 class='center'>Introduisez les informations du produit s'ils vout plait :</h2>
<form action="insert_produit.php" method="POST">
<div class="container" style="width: 65%">
    <label for="nom"><b>Nom:</b></label>
    <input type="text" placeholder="Entrer le nom du produit" name="nom" required>

    <label for="description"><b>Description:</b></label>
    <input type="text" placeholder="Decrivez le produit" name="description"> <br>

    <label for="quantité"><b>Quantité:</b></label>
    <input type="number" placeholder="Entrer la quantité" name="qte" min=1 required><br>

    <label for="prix"><b>Prix:</b></label>
    <input type="number" placeholder="Inserez le prix" name="prix" min=0 step="any" required> <br>
     
   
   <label for="categorie"><b>Catégorie  </b></label>
  <select name="categorie">
  <option value="Vetements">Vetements</option> 
  <option value="Alimentaire" selected>Alimentaire</option>
  <option value="Jouets">Jouets</option>
 </select> <br><br>
    <button class="btn btn-outline-primary" type="submit">Ajouter</button>
    <button class="btn btn-outline-primary" type="reset">Recommancer </button> 



</div>

</body>
</html>