
<body>
  

<!-- navbar -->
<nav class = "navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
        <div class = "container">
            <a class = "navbar-brand d-flex justify-content-between align-items-center order-lg-0" href = "./">
                <img src = "images/Logo_EASYSCOOTER-removebg-preview.png" height="100%" alt = "site icon">
                <span class = "text-uppercase fw-lighter ms-2">ELECTRACKK</span>
            </a>
            


            <div class = "order-lg-2 nav-btns">
                <button onclick="window.location.href='card.php'" type = "button" class = "btn position-relative">
                    <i class = "fa fa-shopping-cart" >      
                    <span class="position-absolute top-0 start-100 translate-middle badge bg-light bg-dark" id="cart-container"><?php 
                    if(isset($_SESSION["products"])){
                        echo count($_SESSION["products"]); 
                    } else {
                       
                    }
                    ?></span>
                
                    </i>
                </button>

                 <button onclick="askNotificationPermission()"  id="notif" type = "button" class = "btn position-relative">
                     <i class = "fa fa-bell" >
                    <span class="position-absolute top-0 start-100 translate-middle badge bg-light bg-dark" id=""><?php 
                   /*  if(isset($_SESSION["products"])){
                        echo count($_SESSION["products"]); 
                    } else {
                       
                    } */
                    ?></span>
                
                    </i>
                </button>
               
                    

                       <span>

                        </span>
                   

                        

                    
            
              
            </div>
            

            <button class = "navbar-toggler border-0" type = "button" data-bs-toggle = "collapse" data-bs-target = "#navMenu">
                <span class = "navbar-toggler-icon"></span>
            </button>


            

            <div class = "collapse navbar-collapse order-lg-1" id = "navMenu">
                <ul class = "navbar-nav mx-auto text-center">

    

                        <?php
                    if(isset($_SESSION['email'])){
                        // L'utilisateur est connecté
                        ?>
                        <li class = "nav-item px-2 py-2">
                                <a class = "nav-link text-uppercase text-dark" href = "index.php">home</a>
                            </li>
                            <li class = "nav-item px-2 py-2 border-0">
                                <a class = "nav-link text-uppercase text-dark" href = "./castle/Castle copy.html">game</a>
                            </li>
                            <li class = "nav-item px-2 py-2">
                                <a class = "nav-link text-uppercase text-dark" href = "scooter_all.php">map</a>
                            </li>
                            <li class = "nav-item px-2 py-2">
                                <a class = "nav-link text-uppercase text-dark" href = "http://localhost:8888/Workflow2/webApp_style/google/Distance/">distance</a>
                            </li>
                            <li class = "nav-item px-2 py-2">
                                    <a class = "nav-link text-uppercase text-dark" href = "abo1.php">Abo1</a>
                             </li>
                        <li class = "nav-item px-2 py-2">
                                    <a class = "nav-link text-uppercase text-dark" href = "shop.php">shop</a>
                             </li>
                         <li class = "nav-item px-2 py-2">
                                    <a class = "nav-link text-uppercase text-dark" href = "trot.php">scooter</a>
                             </li>     
                        <li class = "nav-item px-2 py-2">
                                <a class = "nav-link text-uppercase text-dark" href = "profile.php">profile</a>
                            </li>
                        <li class = "nav-item px-2 py-2">
                                    <a class = "nav-link text-uppercase text-dark" href = "deconnexion.php">Logout</a>
                             </li>
                         <li class = "nav-item px-2 py-2">
                                    <a class = "nav-link text-uppercase text-dark" href = "contact.php">contact</a>
                             </li>
                        <?php

                             
                                if (isset($_SESSION['email'])){
                                    $recupProfil =$bdd->prepare("SELECT * FROM users WHERE email= '".$_SESSION['email']."'");     
                                    $recupProfil->execute();
                                    $voirProfil =$recupProfil->fetch();
                                    if($voirProfil["role_id"] == 3){

                                        ?>
                                         <li class = "nav-item px-2 py-2">
                                                <a class = "nav-link text-uppercase text-dark" href = "Admin/iindex.php">Admin Panel</a>
                                        </li>
                                        <?php
                                        
                                
                                   
                                
                                    };
                                }
                      
                         

                    }else{
                        ?>
                        <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "index.php">Home</a>
                    </li>
                   
                    <li class = "nav-item px-2 py-2 border-0">
                        <a class = "nav-link text-uppercase text-dark" href = "shop.php">shop</a>
                    </li>
                    <li class = "nav-item px-2 py-2 border-0">
                        <a class = "nav-link text-uppercase text-dark" href = "./castle/Castle copy.html">game</a>
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
   
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <!-- custom js -->
    <script src = "js/script.js"></script>




    <style>
    #scrollUp
    {
    position: fixed;
    bottom : 10px;
    right: -100px;
    opacity: 0.5;
    }
      
    
    </style>

        <script>
                    jQuery(function(){
                        $(function () {
                            $(window).scroll(function () {
                                if ($(this).scrollTop() > 200 ) { 
                                    $('#scrollUp').css('right','10px');
                                } else { 
                                    $('#scrollUp').removeAttr( 'style' );
                                }
        
                            });
                        });
                    });
        </script>





  