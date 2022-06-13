<?php 
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');



if (isset($_SESSION['email'])){
    $recupProfil =$bdd->prepare("SELECT * FROM users WHERE email= '".$_SESSION['email']."'");     
    $recupProfil->execute();
    $voirProfil =$recupProfil->fetch();
    $user_id = $voirProfil['id'];

    if(count($_POST)>0)  {
        $user_id = $voirProfil['id'];
        $product = $_SESSION['product'];


        /* foreach($product_ as $key => $value) {
            $product_[$key]=$value->__toString();
        } */
    
        $radmin = $bdd->exec( "INSERT INTO cart (user_id )   VALUES ($user_id )   ;" );
        $message[] = 'ok ';

    }}


    





?>

 