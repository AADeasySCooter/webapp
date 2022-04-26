<?php
session_start();
include('includes/db.php');


 if (isset($_SESSION['email'])){
    $getid =  trim($_SESSION['email']);
    $recupProfil =$bdd->prepare("SELECT * FROM users WHERE email= '".$_SESSION['email']."'");     
    $recupProfil->execute();
    $voirProfil =$recupProfil->fetch(); 

}
?>
<?php

if(isset($voirProfil['role_id']) == 3){
  include( "Admin.php" );

}else{

   include( "error.php" );

}
?>