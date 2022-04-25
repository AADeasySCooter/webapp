<?php 
 
session_start();
include('includes/db.php');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid =  trim($_GET['id']);
    $recupProfil = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
    $recupProfil->execute(array($getid));
    $voirProfil =$recupProfil->fetch();

    if(!isset($voirProfil['id'])){


        header('location : profile.php');
   
   }



}else{
   echo"Aucun id trouvé";
   header("Location: indexx.php");

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
    <div class="container">
     <div class="row">
           <div>
               nom : <?= $voirProfil['nom'] ?>
           </div>
           <div>
               prenom : <?= $voirProfil['prenom'] ?>
           </div> 
           <div>
               age : <?= $voirProfil['age'] ?>
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
