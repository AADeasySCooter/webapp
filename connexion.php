<?php 
include('includes/head.php');
include('includes/header.php');
?>
<!DOCTYPE html>

    
    <!-- navbar -->
 
    <!-- end of navbar -->

    
	<body>
        
    <main>
        <div class = "container">
          <div class="div-center">
          <section id="course" class="course">
            

                <div class = "title text-center">
                    <h2 class = "position-relative d-inline-block"> login</h2>
                </div>
                            
                            
                    <div class="row">
                        
                        <div class="course-col">
                                <?php
                                if(isset($_SESSION['email'])){
                                    // L'utilisateur est connecté
                                    

                                    echo 'already logged';
                                    

                                }else{
                                    include('includes/message.php');
                                    ?>

                                    <form  method="post" action="verification.php" enctype="multipart/form-data" class="form1">
                                        <div class="mb-3">
                                        <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Your email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
                                        </div>
                                        <div class="mb-3">
                                        <label class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="your password">
                                        </div>
                                            <input type="submit" class="btn btn-primary" value="sign in" >
                                            <hr />
                                            <a href="inscription.php" style="text-decoration: none;">Sign up</a>
                                        </form>
                                <?php 

                                }
                                
                                ?>

                            

                        </div>
                
                    </div>
          </section>        
                
          </div>  
         </div>
 
    </main>

		

	</body>

</html>

                                 