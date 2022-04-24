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

                <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "index.php">home</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "#collection">collection</a>
                    </li>
                    <li class = "nav-item px-2 py-2 border-0">
                        <a class = "nav-link text-uppercase text-dark" href = "shop.php">shop</a>
                    </li>
                    
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "#blogs">blogs</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "#about">about us</a>
                    </li>
                    <li class = "nav-item px-2 py-2 border-0">
                        <a class = "nav-link text-uppercase text-dark" href = "connexion.php">sign up/in</a>
                    </li>
                    
                        <?php
                       
                    if(isset($_SESSION['email'])){
                        // L'utilisateur est connecté
                        

                        echo '<li class = "nav-item px-2 py-2">
                                <a class = "nav-link text-uppercase text-dark" href = "profile.php">profile</a>
                            </li>';
                        echo '<li class = "nav-item px-2 py-2">
                                    <a class = "nav-link text-uppercase text-dark" href = "#header">Disconection</a>
                                </li>';

                    }else{
                       
                       
                    }
                    
                    ?>



                    
                </ul>
            </div>
        </div>
    </nav>
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