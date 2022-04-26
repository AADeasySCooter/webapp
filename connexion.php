<?php 
include('includes/head.php');
include('includes/header.php');
?>
<!DOCTYPE html>

    
    <!-- navbar -->
 
    <!-- end of navbar -->

    
	<body>
        

    <section id = "collection" class = "py-5">
        <div class = "container">
            <div class = "title text-center">
                <h2 class = "position-relative d-inline-block"> login</h2>
            </div>

    

                <div class = "collection-list mt-4 row gx-0 gy-3">
                    

                    <div class = "col-md-6 col-lg-4 col-xl-3 p-2 feat">
                        
                        <div class = "text-center">
                        <div class="row">
					
                    <div class="course-col">
                             <?php
                            if(isset($_SESSION['email'])){
                                // L'utilisateur est connecté
                                

                                echo 'already logged';
                                

                            }else{
                                ?>
                                 <form  method="post" action="verification.php" enctype="multipart/form-data" class="form1">
                                    <div class="mb-3">
                                    <label class="form-label">Votre email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Votre email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
                                    </div>
                                    <div class="mb-3">
                                    <label class="form-label">Votre mot de passe</label>
                                        <input type="password" name="password" class="form-control" placeholder="Votre mot de passe">
                                    </div>
                                    <div class="g-recaptcha" data-sitekey="6LdzzmwfAAAAAJsAajlJQ2rbE3JXH6eK799uLz0l"></div>
                                        <input type="submit" class="btn btn-primary" value="sign in" >
                                        <a href="inscription.php">sign up</a>
                                    </form>
                            <?php 

                            }
                            
                            ?>

                           

                      </div>
               
               </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

		

	</body>
</html>