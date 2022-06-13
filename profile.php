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
                                       Firstname: <?= $voirProfil['firstname'] ?>
                                    </div>
                                    <div>
                                        Lastname  : <?= $voirProfil['lastname'] ?>
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
                                      include('includes/message.php'); 

                                     echo " 
                                     
                                    

                                     <br><br><br><br>
                                     
                                     <div id='box'>
                                          <h1>Change your data</h1>
                                          <p>You can change your data.</p>
                                          <a class='link-warning' href='updateUser.php?id=".$voirProfil['id']."' title='".$voirProfil['id']."'>Update</a> 
                                     </div> 
                                     <hr>
                                       

                                     <br><br><br><br>
                                     <div id='box'>
                                          <h1>Attention!</h1>
                                          <p>You are going to delete this user permanently.</p>
                                          <a class='link-danger' href='DeleteUser.php?id=".$voirProfil['id']."' title='".$voirProfil['id']."'>Delete</a> 
                                     </div>   
                                     <hr>
                                       

                                     <br><br><br><br>  
                                     <h1>Download your recipe!</h1>
                                     <p>there are all your payments here.</p>

                                     ";
                                     if (isset($_SESSION['email'])){
                                        $recupProfil =$bdd->prepare("SELECT * FROM users WHERE email= '".$_SESSION['email']."'");     
                                        $recupProfil->execute();
                                        $voirProfil =$recupProfil->fetch();
                                        $user_id = $voirProfil['id'];}

                                       $getProduct = $bdd->query("SELECT * FROM cart where user_id =$user_id "); 
                                       while($product = $getProduct->fetch()){ ?>
                                       
                                            
                                            <tr>
                                                <td><?= $product['id'] ;?></td>  
                                                
                                                <td> 
                                                <form method="POST" action="pdf.php">
                                                    <button name="pdf_gen" href="receipt.php" class="btn btn-warning"></i> Download receipt</button>
                                                 </form>
                                                </td>

                                            </tr>
                                                    
                                                
            
                                    
                                
                                    <?php
             
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
