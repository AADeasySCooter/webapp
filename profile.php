<?php 
    include('includes/head.php');
    include('includes/header.php');

 
include('includes/db.php');
if(isset($_SESSION['email'])){
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

    <div class="container"></br></br></br></br></br></br></br></br>
     <div class="row">
           <div>
                prenom: <?= $voirProfil['firstname'] ?>
           </div>
           <div>
               nom  : <?= $voirProfil['lastname'] ?>
           </div> 
           <div>
                <?php if (isset($_SESSION['email'])){
                                    $getid =  trim($_SESSION['email']);
                                    $recupProfil =$bdd->prepare("SELECT * FROM users WHERE email= '".$_SESSION['email']."'");     
                                    $recupProfil->execute();
                                    $voirProfil =$recupProfil->fetch();
                                    if(isset($voirProfil['role_id']) == 3){


                                        echo ' role : ADMINISTRATOR';
                                    }else if(isset($voirProfil['role_id']) == 2){
                                        echo ' role : EDITOR';
                                    }else{

                                    }
                                
                                   
                                
                                }
                ?>
              </div>
              
              <div>
               email : <?= $voirProfil['email'] ?>
              </div>
              <br><br>
              </div>    
           </div>
     </div>
    </div>
</body>
</html>
