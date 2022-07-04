
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

                    
    


                    
                    <button onclick="window.location.href=''" id="fr" type = "button" class = "btn position-relative">
                    🇫🇷  
                    </button>
                    <button onclick="window.location.href=''" id="en" type = "button" class = "btn position-relative">
                    🇺🇸
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
                        ?>
                        <li class = "nav-item px-2 py-2">
                                <a class = "nav-link text-uppercase text-dark" href = "index.php"><?= _('home')?></a>
                            </li>
                            <li class = "nav-item px-2 py-2 border-0">
                                <a class = "nav-link text-uppercase text-dark" href = "webgl.html"><?= _('game')?></a>
                            </li>
                        <li class = "nav-item px-2 py-2">
                                    <a class = "nav-link text-uppercase text-dark" href = "shop.php"><?= _('shop')?></a>
                             </li>
                         <li class = "nav-item px-2 py-2">
                                    <a class = "nav-link text-uppercase text-dark" href = "trot.php"><?= _('scooter')?></a>
                             </li>     
                        <li class = "nav-item px-2 py-2">
                                <a class = "nav-link text-uppercase text-dark" href = "profile.php"><?= _('profile')?></a>
                            </li>
                        <li class = "nav-item px-2 py-2">
                                    <a class = "nav-link text-uppercase text-dark" href = "deconnexion.php"><?= _('Logout')?></a>
                             </li>
                        <?php

                             
                                if (isset($_SESSION['email'])){
                                    $recupProfil =$bdd->prepare("SELECT * FROM users WHERE email= '".$_SESSION['email']."'");     
                                    $recupProfil->execute();
                                    $voirProfil =$recupProfil->fetch();
                                    if($voirProfil["role_id"] == 3){

                                        ?>
                                         <li class = "nav-item px-2 py-2">
                                                <a class = "nav-link text-uppercase text-dark" href = "Admin/iindex.php"><?= _('Admin Panel')?></a>
                                        </li>
                                        <?php
                                        
                                
                                   
                                
                                    };
                                }
                      
                         

                    }else{
                        ?>
                        <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "index.php"><?= _('home')?></a>
                    </li>
                   
                    <li class = "nav-item px-2 py-2 border-0">
                        <a class = "nav-link text-uppercase text-dark" href = "shop.php"><?= _('shop')?></a>
                    </li>
                    <li class = "nav-item px-2 py-2 border-0">
                        <a class = "nav-link text-uppercase text-dark" href = "webgl.html"><?= _('game')?></a>
                    </li>
                   
                    <li class = "nav-item px-2 py-2 border-0">
                        <a class = "nav-link text-uppercase text-dark" href = "connexion.php"><?= _('sign up/in')?></a>
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
     <!--for top button-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


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
        <script>
          
                

            //demander d'activer les notifications push sur le navigateur
            window.addEventListener('load', function() {
                if (Notification.permission === 'default') {
                    Notification.requestPermission();
                }
            });
            //si l'utilisateur accepte les notifications push, on les active
            if (Notification.permission === 'granted') {
                //afficher la notification au milieu de la page

                var notification = new Notification('Bienvenue sur le site de la marque "Trot"', {
                    body: "Vous pouvez désormais commander des vélos sur notre site",
                    icon: 'https://img.icons8.com/material-outlined/24/000000/alarm.png'
                });

               
            }       
            
            //afficher une notification en bas de l'écran




        </script>
    