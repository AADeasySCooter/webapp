<?php 
    //error_reporting(0);

    include('includes/head.php');
    include('includes/header.php');
    include('includes/db.php');
    include('includes/function.php');
    include('reduc.php');
    $user_id = user_id();
    $user = getUserById($user_id);






?>

<!DOCTYPE html>

    <div class="container">
        
    </br></br></br></br></br></br></br></br>


     <div class="row">
           
           <div>
                <?php
                
                 if ( $user_id != 0 ) {
                                  
                                    ?>
                                    <div>
                                       Firstname: <?= $user['firstname'] ?>
                                    </div>
                                    <div>
                                        Lastname  : <?= $user['lastname'] ?>
                                    </div> 
                                    <div>
                                        email : <?= $user['email'] ?>
                                     </div>
                                     <div>
                                        point : <?= $user['point'] ?>
                                     </div>
                                     <?php
                                      if($user["role_id"] == 3){


                                        echo ' role : ADMINISTRATOR';
                                    }else if($user["role_id"] == 2){
                                        echo ' role : EDITOR';
                                    }else{


                                    }
                                      include('includes/message.php'); 

                                     echo " 
                                     
                                    

                                     <br><br><br><br>
                                     
                                     <div id='box'>
                                          <h1>Change your data</h1>
                                          <p>You can change your data.</p>
                                          <a class='link-warning' href='updateUser.php?id=".$user['id']."' title='".$user['id']."'>Update</a> 
                                     </div> 
                                     <hr>
                                       

                                     <br><br><br><br>
                                    <p>
                                        <button class='btn btn-primary' type='button' data-bs-toggle='collapse' data-bs-target='#collapseExample' aria-expanded='false' aria-controls='collapseExample'>
                                        Delete your account
                                        </button>
                                    </p>
                                 <div class='collapse' id='collapseExample'>
                                   <div class='card card-body'>
                                            <div id='box'>
                                                <h1>Attention!</h1>
                                                <p>You are going to delete this user permanently.</p>
                                                <a class='link-danger' href='DeleteUser.php?id=".$user['id']."' title='".$user['id']."'>Delete</a> 
                                            </div>   

                                   </div>
                                 </div>
                                           
                                     <hr>
                                       

                                     <br><br><br><br>  
                                     <h1>Download your receipt!</h1>
                                     <p>there are all your payments here.</p>

                                     ";
                                        $products = getCart();
                                      foreach($products as $product){
                                           $id_product = $product['id'];
                                           
                                           ?>
                                       
                                            
                                            <tr>
                                                <td><?= $id_product;?></td>  
                                                
                                                <td> 
                                                <form method="POST" action="pdf.php">
                                                    <input type="hidden" name="id" value="<?= $id_product ;?>">
                                                    <input type="submit" name="pdf_gen" class="btn btn-warning" value="Download receipt">
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
              <?php
                var_dump($user);
              ?>
              
              
              <br><br>
             
              </div>    
           </div>
     </div>
    </div>
</body>
</html>
