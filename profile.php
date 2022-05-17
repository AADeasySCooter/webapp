<?php 
    include('includes/head.php');
    include('includes/header.php');
    include('includes/db.php');

 



?>

<!DOCTYPE html>

    <div class="container"></br></br></br></br></br></br></br></br>


     <div class="row">
           
           <div>
                <?php
                
                 if (isset($_SESSION['email'])){
                                    $recupProfil =$bdd->prepare("SELECT * FROM users WHERE email= '".$_SESSION['email']."'");     
                                    $recupProfil->execute();
                                    $voirProfil =$recupProfil->fetch();
                                    ?>
                                    <div>
                                       prenom: <?= $voirProfil['firstname'] ?>
                                    </div>
                                    <div>
                                        nom  : <?= $voirProfil['lastname'] ?>
                                    </div> 
                                    <div>
                                        email : <?= $voirProfil['email'] ?>
                                     </div>
                                    <?php

                                    if($voirProfil["role_id"] == 3){


                                        echo ' role : ADMINISTRATOR';
                                    }else if($voirProfil["role_id"] == 2){
                                        echo ' role : EDITOR';
                                    }else{


                                    }
                                
                                   
                                
                                }else{
                                    $link_address = 'connexion.php';
                                    echo "<a href='".$link_address."'>PLEASE SIGN IN BEFORE</a>";

                                }
                ?>
              </div>
              
              
              <br><br>
             
              </div>    
           </div>
     </div>
    </div>
</body>
</html>
