<?php
include('./db.php');



    if (isset($_SESSION['email'])){
        $recupProfil =$conn->prepare("SELECT * FROM users WHERE email= '".$_SESSION['email']."'");     
        $recupProfil->execute();
        $voirProfil =$recupProfil->fetch();
        if($voirProfil["status"] == 3){
    
    
          header("Location:../error.php");
       
    
        };
    }



