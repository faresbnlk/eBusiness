<?php
require ('db_config.php');
try {
$db = new PDO( "mysql:host=$host;dbname=$data" , $utilisateur , $mot_de_passe);

include ("verifier.php");
$nom = $prenom = $login = $password= $password2 = $role= "";

if (isset($_POST['login']) && isset($_POST['password'])) {
  $login = verifier($_POST["login"]);
  $password= verifier($_POST["password"]);
}

$SQL=("SELECT * FROM users where login=?");
$res=$db -> prepare($SQL);
$res->execute([$login]);



$donnee=$res->fetch();
		if($login==$donnee['login'] && password_verify($password,$donnee['mdp'])==true ){
			if($donnee['role']=='acheteur'){
				session_start();
				$_SESSION['uid_acheteur']=$donnee['uid'];
				$_SESSION['nom_acheteur']=$donnee['nom'];
				$_SESSION['prenom_acheteur']=$donnee['prenom'];
				$_SESSION['login_acheteur']=$donnee['login'];
				header('Location: session_acheteur.php');
				
			}else{
				session_start();
				
				$_SESSION['uid_vendeur']=$donnee['uid'];
				$_SESSION['nom_vendeur']=$donnee['nom'];
				$_SESSION['prenom_vendeur']=$donnee['prenom'];
				$_SESSION['login_vendeur']=$donnee['login'];
				header('Location: session_vendeur.php');
				
			}
            echo "<br>";
}else{
	echo('<script type="text/javascript">
    alert("Login ou Mot de passe que vous avez saisi est incorrecte");
    document.location.href = "acceuil.php";
</script>');
   
}


}
catch(PDOException $e)
{
exit("Erreur de connexion" .$e->getMessage());
}





?>
