<?php

// Si l'email n'est pas vide, enregistrer cet email dans un cookie
if(isset($_POST['email']) && !empty($_POST['email'])){
	setcookie('email', $_POST['email'], time() + (24 * 60 * 60));
}

// redirection vers le formulaire
if(!isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['password']) || empty($_POST['password']) || !isset($_POST['firstname']) || empty($_POST['firstname']) || !isset($_POST['lastname']) || empty($_POST['lastname'])){
	// Rediriger vers la page inscription avec une erreur
	header('location:inscription.php?message=Vous devez remplir les 4 champs.&type=danger');
	exit;
}

//  > redirection vers le formulaire
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	// Rediriger vers la page inscription avec une erreur
	header('location:inscription.php?message=Email invalide.&type=danger');
	exit;
}


include('includes/db.php');

$q = 'SELECT id FROM users WHERE email = ?';
$req = $bdd->prepare($q);
$req->execute([$_POST['email']]);

$result = $req->fetch(); 

if($result !== false){
	// Rediriger vers la page inscription avec une erreur
	header('location:inscription.php?message=Email déjà utilisé.&type=danger');
	exit;
}

$ip = $_SERVER['REMOTE_ADDR'];

$q = 'INSERT INTO users (firstname , lastname , email, password, ip) VALUES (:firstname, :lastname, :email, :password, :ip)';
$req = $bdd->prepare($q); // Création de la requête préparée

$reponse = $req->execute([
	'firstname' => $_POST['firstname'],
	'lastname' => $_POST['lastname'],
	'email' => $_POST['email'],
	'password' => hash('sha256', $_POST['password']),
	'ip' => $ip
]);



if($reponse){

	header('location:index.php?message=Compte créé avec succès.&type=success');
	exit;
}else{
	header('location:inscription.php?message=Erreur lors de la création du compte.&type=danger');
	exit;
}




















