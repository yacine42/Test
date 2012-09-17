<?php 

session_start();

//if($_SESSION['rights'] != 'null')
//{
//	header('Location: index.php');
//	exit();
//}

include("include/db_connect.php");

$donnees_user;

// On recupere tout le contenu de la table user
$reponse = $bdd->query('SELECT * FROM users');

// On lit chaque entree une a une
while ($donnees_user = $reponse->fetch())
{
	if ($donnees_user['username']== htmlspecialchars($_POST['login']) AND $donnees_user['password'] == htmlspecialchars($_POST['password']))
	{
		// Si le mot de passe est bon
		// On synchronise la session avec les donnees
		$_SESSION['user'] = $donnees_user['user'];
		$_SESSION['rights'] = $donnees_user['rights'];
		$reponse->closeCursor(); // Termine le traitement de la requete
    	header('Location: home.php');
		exit();
	}
}

$_SESSION['VERIF']=1;
header('Location: index.php');


Et la !!!
//modif inutile
?>