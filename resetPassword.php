<?php 
include('includes/head.php');
include('includes/header.php');
?>

<!DOCTYPE html>


<body>
        
        <main>
            <div class = "container">
              <div class="div-center">
                                
                                
                        <div class="row">
                            <h1>Reset your password </h1>
                            <p>An email will be sent to your email address with instructions for reset your password.</p>
                            
                                <form method="post" action="reset.php">
                                        <div class="mb-3">
                                        <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Your email" >
                                        </div>
                                            <input type="submit" name="reset-password" class="btn btn-primary" >Reset password
                                        
                                </form>
                            
                        </div>
                    
                    
              </div>  
             </div>
     
        </main>
    
            
    
        </body>