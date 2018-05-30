<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<meta charset="utf-8" />
	<style>
    <?php include("style_final.css"); ?>
    </style>
</head>
<body>
  <div class="container" style="width: 750px">
	<H2 class='center' style="color:blue">Modifiez votre mot de passe !! </H2>
	<form action="insert_new_password.php" method="post"> 
      <label for="login"><b>Login: </b> </label>
      <input type="text" placeholder="Entrer votre login" name="login" size="20" required>

    <H4 style="color:red" class='center' >Veuillez taper les informations correspondantes au Login  !! </H4>

      <label for="nom"><b>nom: </b></label>
      <input type="text" name="nom" placeholder="Entrer votre nom" size="20" required>
      <label for="prenom"><b>prenom: </b></label>
      <input type="text" name="prenom" placeholder="Entrer votre prenom" size="20" required>
      <label for="new_password"><b>nouveau mot de passe: </b></label>
      <input type="password" name="new_password" placeholder="Entrer le mot de passe" size="20" required>
      <label for="new_password2"><b>confirmation mot de passe: </b></label>
      <input type="password" name="new_password2" placeholder="Confirmer le mot de passe" size="20" required>
   <br> <br>
    <button type="submit" class="btn btn-outline-primary">Valider</button>
    <button type="reset" class="btn btn-outline-primary">Recommancer </button> <br>
    <a class="center" href="javascript:history.go(-1)">Précédent</a>


	</form>
</div>




</body>
</html>