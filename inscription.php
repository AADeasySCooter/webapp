<?php 

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attire Home</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel = "stylesheet" href = "css/main.css">
</head>
<body>
    
    <!-- navbar -->
    <nav class = "navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
        <div class = "container">
            <a class = "navbar-brand d-flex justify-content-between align-items-center order-lg-0" href = "index.html">
                <img src = "images/Logo_EASYSCOOTER-removebg-preview.png" alt = "site icon">
                <span class = "text-uppercase fw-lighter ms-2">Elect-track</span>
            </a>

            <div class = "order-lg-2 nav-btns">
                <button type = "button" class = "btn position-relative">
                    <i class = "fa fa-shopping-cart"></i>
                   <!-- <span class = "position-absolute top-0 start-100 translate-middle badge bg-primary">5</span> -->
                </button>
                <!-- <button type = "button" class = "btn position-relative">
                    <i class = "fa fa-heart"></i>
                    <span class = "position-absolute top-0 start-100 translate-middle badge bg-primary">2</span>
                </button>  -->
                <button type = "button" class = "btn position-relative">
                    <i class = "fa fa-search"></i>
                </button>
            </div>

            <button class = "navbar-toggler border-0" type = "button" data-bs-toggle = "collapse" data-bs-target = "#navMenu">
                <span class = "navbar-toggler-icon"></span>
            </button>


            

            <div class = "collapse navbar-collapse order-lg-1" id = "navMenu">
                <ul class = "navbar-nav mx-auto text-center">

                <?php
                    if(isset($_SESSION['email'])){
                        // L'utilisateur est connecté
                        echo '<li class = "nav-item px-2 py-2">
                                <a class = "nav-link text-uppercase text-dark" href = "index.php">home</a>
                            </li>';
                        echo '<li class = "nav-item px-2 py-2">
                                    <a class = "nav-link text-uppercase text-dark" href = "shop.php">shop</a>
                             </li>';
                        echo '<li class = "nav-item px-2 py-2">
                                <a class = "nav-link text-uppercase text-dark" href = "profile.php">profile</a>
                            </li>';
                        echo '<li class = "nav-item px-2 py-2">
                                    <a class = "nav-link text-uppercase text-dark" href = "#header">Disconection</a>
                             </li>';
                         

                    }else{
                        ?>
                        <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "index.php">home</a>
                    </li>
                   
                    <li class = "nav-item px-2 py-2 border-0">
                        <a class = "nav-link text-uppercase text-dark" href = "shop.php">shop</a>
                    </li>
                   
                    <li class = "nav-item px-2 py-2 border-0">
                        <a class = "nav-link text-uppercase text-dark" href = "connexion.php">sign up/in</a>
                    </li>
                    <?php
                    }
                    
                    ?>



                </ul>
            </div>
        </div>
    </nav>
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