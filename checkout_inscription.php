<?php
include('includes/head.php');

// redirection vers le formulaire
if(!isset($_POST['address']) || empty($_POST['address']) || !isset($_POST['number']) || empty($_POST['number']) || !isset($_POST['code_postal']) || empty($_POST['code_postal']) || !isset($_POST['ville']) || empty($_POST['ville'])){
	// Rediriger vers la page inscription avec une erreur
	header('location:checkout1.php?message=You must fill in the 4 fields.&type=danger');
	exit;
}



include('includes/db.php');


    



    $q = " UPDATE  users SET  (address=:address , number=:number , code_postal=:code_postal , ville=:ville )  WHERE email= '".$_SESSION['email']."' ";
    $req = $bdd->prepare($q);
    
    $reponse = $req->execute([
        'address' => $_POST['address'],
        'number' => $_POST['number'],
        'code_postal' => $_POST['code_postal'],
        'ville' =>  $_POST['ville']
      
    ]);






if($reponse){

	header('location:checkout2.php?message=checkout1 ok.&type=success');
		

		// Mettre dans la session un paramètre 
		$_SESSION['address'] = $_POST['address'];
        $_SESSION['number'] = $_POST['number'];
        $_SESSION['code_postal'] = $_POST['code_postal'];
        $_SESSION['ville'] = $_POST['ville'];
	
	exit;
}else{
	header('location:checkout1.php?message=checkout1 not ok.&type=danger');
	exit;
}




















