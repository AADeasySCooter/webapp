<?php 
include('includes/head.php');
include('includes/header.php');
?>
<!DOCTYPE html>

    
    <!-- navbar -->
  
    <!-- end of navbar -->

	

		<main>
			<div class="container">
                 <div class="div-center">
                    <section id="course" class="course">
                    
                        
                    <div class="row">
                        
                        <div class="course-col">
                        
                            <div class = "title text-center">
                            <h2 class = "position-relative d-inline-block"> Register</h2>
                            </div>
                        <?php include('includes/message.php'); ?>

                        
                                <form method="post" action="verification_inscription.php" enctype="multipart/form-data" class="form1">

                                <div class="mb-3">
                                <label class="form-label">Firstname</label>
                                    <input type="text" name="firstname" class="form-control" placeholder="firstname " >
                                </div>
                                <label class="form-label">Lastname</label>
                                    <input type="text" name="lastname" class="form-control" placeholder="lastname " >
                                </div>
                                <div class="mb-3">
                                <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="your email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
                                </div>
                                <div class="mb-3">
                                <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="your password">
                                </div>
                                    <input type="submit" class="btn btn-primary" value="Sign up"  >
                                </form>

                        </div>
                    

                    
                    
                    </div>

                    </section>
                </div>
			</div>
		</main>


	</body>
</html>