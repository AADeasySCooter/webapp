<body>
<!-- navbar -->
<nav class = "navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
        <div class = "container">
            <a class = "navbar-brand d-flex justify-content-between align-items-center order-lg-0" href = "./">
                <img src = "images/Logo_EASYSCOOTER-removebg-preview.png" alt = "site icon">
                <span class = "text-uppercase fw-lighter ms-2">Elect-track</span>
            </a>

            <div class = "order-lg-2 nav-btns">
                <button type = "button" class = "btn position-relative">
                    <i class = "fa fa-shopping-cart"></i>
                    <a href = "card.php"></a>
                   <!-- <span class = "position-absolute top-0 start-100 translate-middle badge bg-primary">5</span> -->
                </button>
                <!-- <button type = "button" class = "btn position-relative">
                    <i class = "fa fa-heart"></i>
                    <span class = "position-absolute top-0 start-100 translate-middle badge bg-primary">2</span>
                </button>  -->
               
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
                                    <a class = "nav-link text-uppercase text-dark" href = "deconnexion.php">Disconect</a>
                             </li>';

                             
                                if (isset($_SESSION['email'])){
                                    $recupProfil =$bdd->prepare("SELECT * FROM users WHERE email= '".$_SESSION['email']."'");     
                                    $recupProfil->execute();
                                    $voirProfil =$recupProfil->fetch();
                                    if($voirProfil["role_id"] == 3){


                                        echo '<li class = "nav-item px-2 py-2">
                                                <a class = "nav-link text-uppercase text-dark" href = "Admin/iindex.php">Admin Pannel</a>
                                        </li>';
                                
                                   
                                
                                    };
                                }
                      
                         

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
   
    <script src = "js/jquery-3.6.0.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <script src = "bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src = "js/script.js"></script>