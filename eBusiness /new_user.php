<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>INSCRIPTION</title>
<?php include("header.php"); ?>
<style>
<?php include ("style_final.css"); ?>
</style>
</head>

<!-- On affiche un formulaire pour l'inscription contenant les champs: nom, prenom, login, mot de passe, et confimation du mot de passe, et on doit selectionner le role qui est par default acheteur. -->

<body><h2 class='center'>Introduisez vos données s'ils vous plait :</h2>
<form action="insert_user.php" method="POST">
<div class="container" style="width: 300px">
    <label for="nom"><b>Nom:</b></label>
    <input type="text" placeholder="Enter surname" name="nom" required>

    <label for="password"><b>Prenom:</b></label>
    <input type="text" placeholder="Enter name" name="prenom" required>

    <label for="login"><b>Login:</b></label>
    <input type="text" placeholder="Enter Username" name="login" required>

    <label for="password"><b>Mot De Passe:</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
   <label for="password2"><b>Confirmation Mot De Passe:</b></label>
    <input type="password" placeholder="Cofirme Password" name="password2" required>
   
   <label for="role"><b>Role:  </b></label>
  <input type="radio" name="role" value="acheteur" checked> Acheteur
  <input type="radio" name="role" value="vendeur">Vendeur  <br> <br>
    <button type="submit" class="btn btn-outline-primary">S'inscrire</button>
    <button type="reset" class="btn btn-outline-primary">Reset </button> <br>
    <a class="center" href="javascript:history.go(-1)">Précédent</a>
  
  

   </div>  
</form>
</body>
</html>