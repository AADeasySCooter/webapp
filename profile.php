<?php 
    include('includes/head.php');
    include('includes/header.php');

 
include('includes/db.php');
if(isset($_SESSION['email'])){
    $getid =  trim($_SESSION['email']);
    $recupProfil =$bdd->prepare("SELECT * FROM users WHERE email= '".$_SESSION['email']."'");     
    $recupProfil->execute();
    $voirProfil =$recupProfil->fetch();

    if(!isset($voirProfil['id'])){


        header('location : profile.php');
   
   }



}else{
   echo"Aucun id trouvé";
   header("Location: index.php");

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de <?= $voirProfil['email'] ?></title>
</head>
<body>
    <div class="container"></br></br></br></br></br></br></br></br>
     <div class="row">
           <div>
                prenom: <?= $voirProfil['firstname'] ?>
           </div>
           <div>
               nom  : <?= $voirProfil['lastname'] ?>
           </div> 
           <div>
               role : <?= $voirProfil['role_id'] ?>
              </div>
              <div>
               email : <?= $voirProfil['email'] ?>
              </div>
              <br><br>
              <div>
              ip : <?=$_SERVER['REMOTE_ADDR'];?> 
              </div>    
           </div>
     </div>
    </div>
</body>
</html>
