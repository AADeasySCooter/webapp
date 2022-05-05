<?php 
 include('includes/db.php');

 if (isset($_SESSION['email'])){
    $recupProfil =$bdd->prepare("SELECT * FROM users WHERE email= '".$_SESSION['email']."'");     
    $recupProfil->execute();
    $voirProfil =$recupProfil->fetch(); 

}
?>
<?php

if(isset($voirProfil['status']) == 3){
 
  include( "error.php" );

}else{
    

  

}
?>