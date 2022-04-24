<?php 
 
session_start();
include('includes/db.php');

$getProduct = $bdd->query("SELECT * FROM product ORDER BY created_at DESC LIMIT 20");




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
                                <a class = "nav-link text-uppercase text-dark" href = "#header">profile</a>
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


<section id = "collection" class = "py-5">
        <div class = "container">
            <div class = "title text-center">
                <h2 class = "position-relative d-inline-block"> Collection</h2>
            </div>

            <!--<div class = "row g-0">
                <div class = "d-flex flex-wrap justify-content-center mt-5 filter-button-group">
                    <button type = "button" class = "btn m-2 text-dark active-filter-btn" data-filter = "*">All</button>
                    <button type = "button" class = "btn m-2 text-dark" data-filter = ".best">Best Sellers</button>
                    <button type = "button" class = "btn m-2 text-dark" data-filter = ".feat">Featured</button>
                    <button type = "button" class = "btn m-2 text-dark" data-filter = ".new">New Arrival</button>
                </div>-->

                <div class = "collection-list mt-4 row gx-0 gy-3">
                   

          
                        
                       
                    <!--<div class = "col-md-6 col-lg-4 col-xl-3 p-2 best">
                        <div class = "collection-img position-relative">
                            <img src = "images/c_undershirt.png" class = "w-100">
                        </div>
                        <div class = "text-center">
                            <div class = "rating mt-3">
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                            </div>
                            <p class = "text-capitalize my-1">gray shirt</p>
                            <span class = "fw-bold">$ 45.50</span>
                        </div>
                    </div>-->
                    <?php 
                                $getProduct = $bdd->query("SELECT * FROM product ORDER BY created_at DESC LIMIT 10");
                                while($product = $getProduct->fetch()){ ?>
                                    <div class = "col-md-6 col-lg-4 col-xl-3 p-2 feat">
                                        <div class = "collection-img position-relative">
                                        <?php echo '<img src="images/' . $product['product_image'] . '" alt="Image du produit" class = "w-100"  >' ?>
                                        </div>
                                        <div class = "text-center">
                                                
                                            <div class = "rating mt-3">
                                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                            </div>
                                            <p class = "text-capitalize my-1"><?= $product['product_name'] ;?></p>
                                            <span class = "fw-bold">€ <?=  $product['product_price'] ;?></span>
                                        </div>
                                    </div>
                              <?php
                                } ?>
                </div>
            </div>
        </div>
    </section>