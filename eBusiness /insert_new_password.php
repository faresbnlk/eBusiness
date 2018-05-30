<?php 
require ("db_config.php");


include ("verifier.php");


try {

$nom = $prenom = $login = $new_password= $new_password2 = "";

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['login']) && isset($_POST['new_password'])&& isset($_POST['new_password2'])) {
  $nom = verifier($_POST["nom"]);
  $prenom= verifier($_POST["prenom"]);
  $login = verifier($_POST["login"]);
  $new_password = verifier($_POST["new_password"]);
  $new_password2= verifier($_POST["new_password2"]);
}

function verifier_passwords($a, $b){
	if($a==$b) {return true;} else { return false;}
}


$new_password_hash=password_hash($new_password,PASSWORD_DEFAULT);

$db = new PDO( "mysql:host=$host;dbname=$data" , $utilisateur , $mot_de_passe);
$res=$db-> prepare("SELECT * FROM users WHERE login=?");
$res->execute([$login]);
$donnee= $res->fetch();

if( $donnee['nom']==$nom && $donnee['prenom']==$prenom && verifier_passwords($new_password,$new_password2)==true ){
  $db = new PDO( "mysql:host=$host;dbname=$data" , $utilisateur , $mot_de_passe);
	$res2= $db-> prepare("UPDATE users set mdp=:mdp where login=:login");
	$res2->execute(array(
		'mdp'=>$new_password_hash,
        'login'=>$login));
  include("acceuil.php");
echo "<script>alert(\"Bravo: le mot de passe a été changé avec succès\")</script>"; ;
}else{
  include("forgot_password.php");
  echo "<script>alert(\"Vous n'avez pas la permission de changer le mot de passe; veuillez vérifier les informations saisies SVP \")</script>"; }
}
catch(PDOException $e)
{
exit("Erreur de connexion" .$e->getMessage());
}







 ?>