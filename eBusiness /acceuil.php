<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
<?php include("style_final.css"); ?> 

</style>
</head>
<body>

<h2 class="center">Connexion ou Inscription </h2>

<!-- Affichage du formulaire pour la connexion si on a deja un compte: il contient un champs login et un autre pour le mot de passe -->
<!-- Si on a pas de compte on pourra s'inscrire grace au bouton d'inscription
     Si on a oublié le mot de passe on pourra le réinitialiser avec le bouton "mot de passe oublié", et cela avec la saisie des coordonnées personnelles du clients, et apres verifications de ces dernieres on pourra l'autoriser a changer le mot de passe ou non -->

<form action="user_connect.php" method="post">
  <div class="imgcontainer">
    <img src="avatar.png" alt="Avatar" class="avatar">
  </div>
  <div class="container" style="width: 400px">
    <label for="login"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="login" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
  <button type="submit" class="btn btn-outline-primary">Login</button>
  <button type="reset" class="btn btn-outline-primary">Reset</button>

   
  </div>
  <div class="center">
  <a href="new_user.php">S'enregistrer</a><br>

  <a href="forgot_password.php">Mot de passe oublié</a>
 </div>

</form>

</body>
</html>
