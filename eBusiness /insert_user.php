


<?php 

/* on verifie les données inserées  grace a la fonction "verifier"  */
$nom = $prenom = $login = $password= $password2 = $role= "";

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['login'])&& isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['role'])) {
  $nom = verifier($_POST["nom"]);
  $prenom= verifier($_POST["prenom"]);
  $login = verifier($_POST["login"]);
  $password = verifier($_POST["password"]);
  $password2= verifier($_POST["password2"]);
  $role=verifier($_POST["role"]);
}

function verifier($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

/* on fait le hashage du mot de passe avant l'insertion */ 

 $mdp= password_hash($password,PASSWORD_DEFAULT);

require ("db_config.php");
try {
$db = new PDO( "mysql:host=$host;dbname=$data" , $utilisateur , $mot_de_passe);

/* la fonction "existance_login" nous permet de savoir si le login n'est pas deja utilisé pour confirmer l'inscription */

function existance_login ($login_utilisateur) {
	require ("db_config.php");
	$db = new PDO( "mysql:host=$host;dbname=$data" , $utilisateur , $mot_de_passe);
    $res2=$db -> prepare ("SELECT login FROM users WHERE login=:login");
    $res2-> execute(array(
    	'login' => $login_utilisateur));
	if($res2->rowCount()==0){return true;} else {return false;}
}
 /* si le login n'est pas deja utilisé et que les 2 mot de passe saisis lors du remplissage du formulaire d'inscription sont identique on accepte l'inscription */

if( existance_login($login)== true && $password==$password2){
	$res = $db -> prepare("INSERT INTO users (nom, prenom, login, mdp, role) VALUES (:nom, :prenom, :login , :mdp, :role)");
$res-> execute(array(

    'nom' => $nom,

    'prenom' => $prenom,

    'login' => $login,

    'mdp' => $mdp,

    'role' => $role

    ));
include("index.php");
echo "<script>alert(\"Merci pour l'inscription ".$nom." ".$prenom."\")</script>"; 
}else{ 
	include ("new_user.php");
	echo "<script>alert(\"Verifiez vos informations SVP \")</script>"; }

}
catch(PDOException $e)
{
exit("Erreur de connexion" .$e->getMessage());
}



 ?>