<?php 
include('includes/head.php');
include('includes/header.php');
?>
<!DOCTYPE html>

    
    <!-- navbar -->
  
    <!-- end of navbar -->

	

		<main>
			<div class="container">
				<?php include('includes/message.php'); ?>
				<section id="course" class="course">
					

				<div class="row">
					
					 <div class="course-col">
					 
                     <h6>login</h6></br></br></br></br>

                     
							<form method="post" action="verification_inscription.php" enctype="multipart/form-data" class="form1">

							<div class="mb-3">
							<label class="form-label">Firstname</label>
								<input type="text" name="firstname" class="form-control" placeholder="firstname " >
							</div>
                            <label class="form-label">Lastname</label>
								<input type="text" name="lastname" class="form-control" placeholder="lastname " >
							</div>
							<div class="mb-3">
							<label class="form-label">email</label>
								<input type="email" name="email" class="form-control" placeholder="your email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
							</div>
							<div class="mb-3">
							<label class="form-label">password</label>
								<input type="password" name="password" class="form-control" placeholder="Votre mot de passe">
							</div>
								<input type="submit" class="btn btn-primary" value="S'inscrire" >
							</form>

					   </div>
				

				
				
				</div>
				</section>
			</div>
		</main>


	</body>
</html>