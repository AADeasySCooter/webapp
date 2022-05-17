<?php




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
if(!isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['password']) || empty($_POST['password'])){
	// Rediriger vers la page connexion avec une erreur
	header('location:connexion.php?message=You must fill in both fields.&type=danger');
	exit;
}

// Si email invalide > redirection vers le formulaire
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	// Rediriger vers la page connexion avec une erreur
	header('location:connexion.php?message=Email invalid.&type=danger');
	exit;
}


include('includes/db.php');

// Sélectionner l'utilisateur avec cet email et ce mot de passe
$q = 'SELECT id FROM users WHERE email = :email AND password = :password';
$req = $bdd->prepare($q);
$req->execute([
	'email' => $_POST['email'],
	'password' => hash('sha256', $_POST['password'])  // Même méthode de hachge que lors de la création de compte
]);

$reponse = $req->fetch();

if($reponse === false){

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
