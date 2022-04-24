<?php

// Les informations reçues du formulaire se trouvent dans $_POST
//var_dump($_POST);


// Si l'email n'est pas vide, enregistrer cet email dans un cookie

if(isset($_POST['email']) && !empty($_POST['email'])){
	setcookie('email', $_POST['email'], time() + (24 * 60 * 60));


	// Ecrire les tentatives de connexion dans un fichier log.txt

	// Ouverture du fichier (avec création si nécessaire)
	$log = fopen('log.txt', 'a+');

	// Formatage de la ligne à ajouter
	$line = date('Y/m/d - H:i:s') . ' -  Tentative de connexion de : ' . $_POST['email'] . "\n";

	// Ajout de la ligne au fichier
	fputs($log, $line);

	// Fermeture du fichier
	fclose($log);

}






// Si email ou password vide > redirection vers le formulaire
if(!isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['password']) || empty($_POST['password']) || !isset($_POST['username']) || empty($_POST['username'])){
	// Rediriger vers la page connexion avec une erreur
	header('location:connexion.php?message=Vous devez remplir les 3 champs.&type=danger');
	exit;
}

// Si email invalide > redirection vers le formulaire
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	// Rediriger vers la page connexion avec une erreur
	header('location:connexion.php?message=Email invalide.&type=danger');
	exit;
}

// Vérifier dans la base de données si le compte existe

// Connexion à la base de données
include('includes/db.php');

// Sélectionner l'utilisateur avec cet email et ce mot de passe
$q = 'SELECT id FROM users WHERE email = :email AND password = :password';
$req = $bdd->prepare($q);
$req->execute([
	'email' => $_POST['email'],
	'password' => hash('sha256', $_POST['password'])  // Même méthode de hachge que lors de la création de compte
]);

$reponse = $req->fetch(); // renvoie la premiere ligne de résultat ou false si aucun résultat

if($reponse === false){
	// Pas de user trouvé
	// Rediriger vers la page connexion avec une erreur
	header('location:connexion.php?message=Identifiants incorrects.&type=danger');
	exit;
}else{
	// Un user trouvé

	// Ouvrir une session utilisateur
	session_start();

	// Mettre dans la session un paramètre email
	$_SESSION['email'] = $_POST['email'];

	// Redirection vers la page d'accueil
	header('location: index.php');
	exit;
}
