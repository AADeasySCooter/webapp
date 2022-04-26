<?php 
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');


?>
<!DOCTYPE html>

    <!-- navbar -->
    
    

    <!-- end of navbar -->
     <!-- Visible only if logged in -->
    

    <!-- header -->
    <header id = "header" class = "vh-100 carousel slide" data-bs-ride = "carousel" style = "padding-top: 104px;">
        <div class = "container h-100 d-flex align-items-center carousel-inner">
            <div class = "text-center carousel-item active">
                <h2 class = "text-capitalize text-white">best app ever</h2>
                <h1 class = "text-uppercase py-2 fw-bold text-white"></h1>
                <a href = "#" class = "btn mt-3 text-uppercase">Download now</a>
            </div>
            <div class = "text-center carousel-item">
                <h2 class = "text-capitalize text-white">best app ever</h2>
                <h1 class = "text-uppercase py-2 fw-bold text-white"></h1>
                <a href = "#" class = "btn mt-3 text-uppercase">Download now</a>
            </div>
        </div>

        <button class = "carousel-control-prev" type = "button" data-bs-target="#header" data-bs-slide = "prev">
            <span class = "carousel-control-prev-icon"></span>
        </button>
        <button class = "carousel-control-next" type = "button" data-bs-target="#header" data-bs-slide = "next">
            <span class = "carousel-control-next-icon"></span>
        </button>
    </header>
    
    <!-- end of header -->

    <!-- collection -->
    <section id = "collection" class = "py-5">
        <div class = "container">
            <div class = "title text-center">
                <h2 class = "position-relative d-inline-block"> Collection</h2>
            </div>
                    
                    
            <div class = "collection-list mt-4 row gx-0 gy-3">
                
                   
                <?php 
                            $getProduct = $bdd->query("SELECT * FROM product ORDER BY created_at DESC LIMIT 4");
                            while($product = $getProduct->fetch()){ ?>
                                <div class = "col-md-6 col-lg-4 col-xl-3 p-2 feat">
                                <div class="card mb-2">
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
                                         <div class="col-md-6">
                                            <button type="button"
                                                class="btn btn-primary btn-sm btn-block"
                                                id="addToCart-1" onclick="addToCart(1)">
                                                <span class="glyphicon glyphicon-shopping-cart"
                                                    aria-hidden="true"></span> ADD TO CART
                                            </button>
                                         </div>
                                    </div>
                                </div>
                                </div>
                          <?php
                            } ?>

                            
            </div>
            <!--<div class = "row g-0">
                <div class = "d-flex flex-wrap justify-content-center mt-5 filter-button-group">
                    <button type = "button" class = "btn m-2 text-dark active-filter-btn" data-filter = "*">All</button>
                    <button type = "button" class = "btn m-2 text-dark" data-filter = ".best">Best Sellers</button>
                    <button type = "button" class = "btn m-2 text-dark" data-filter = ".feat">Featured</button>
                    <button type = "button" class = "btn m-2 text-dark" data-filter = ".new">New Arrival</button>
                </div>-->

                      
        </div>
    </section>
    <!-- end of collection -->

    <!-- special products -->
  
    <!-- end of special products -->

    <!-- blogs -->
    <section id = "offers" class = "py-5">
        <div class = "container">
            <div class = "row d-flex align-items-center justify-content-center text-center justify-content-lg-start text-lg-start">
                <div class = "offers-content">
                    <span class = "text-white">Discount Up To 40%</span>
                    <h2 class = "mt-2 mb-4 text-white">Grand Sale Offer!</h2>
                    <a href = "#" class = "btn">Buy Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end of blogs -->

    <!-- blogs -->
    <section id = "blogs" class = "py-5">
        <div class = "container">
            <div class = "title text-center py-5">
                <h2 class = "position-relative d-inline-block">Article</h2>
            </div>
            <?php 
                $getArticle = $bdd->query("SELECT * FROM articles ORDER BY date_create DESC LIMIT 1");
                while($article = $getArticle->fetch()){ ?>
               
               <div class = "row g-3">
                <div class = "card border-0 col-md-6 col-lg-4 bg-transparent my-3">
                   <?php echo '<img src="images/' . $article['image'] . '" alt="Image du produit" style="height:200px;width:200px;" >' ?>
                    <div class = "card-body px-0">
                        <h4 class = "card-title"><?= $article['title'] ;?></h4>
                        <p class = "card-text mt-3 text-muted"><?= $article['description'] ;?></p>
                        <p class = "card-text">
                            <small class = "text-muted">
                                <span class = "fw-bold">Author: </span><?= $article['autor'] ;?>
                            </small>
                        </p>
                        <a href = "#" class = "btn">Read More</a>
                    </div>
                </div>


            </div>
                <?php
                 } ?>

            
        </div>
    </section>
    <!-- end of blogs -->

    <!-- about us -->
    <section id = "about" class = "py-5">
        <div class = "container">
            <div class = "row gy-lg-5 align-items-center">
                <div class = "col-lg-6 order-lg-1 text-center text-lg-start">
                    <div class = "title pt-3 pb-5">
                        <h2 class = "position-relative d-inline-block ms-4">About Us</h2>
                    </div>
                    <p class = "lead text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, ipsam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem fuga blanditiis, modi exercitationem quae quam eveniet! Minus labore voluptatibus corporis recusandae accusantium velit, nemo, nobis, nulla ullam pariatur totam quos.</p>
                </div>
                <div class = "col-lg-6 order-lg-0">
                    <img src = "images/about_us.jpg" alt = "" class = "img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- end of about us -->

 
    <!-- end of popular -->

    <!-- newsletter -->
    <section id = "newsletter" class = "py-5">
        <div class = "container">
            <div class = "d-flex flex-column align-items-center justify-content-center">
                <div class = "title text-center pt-3 pb-5">
                    <h2 class = "position-relative d-inline-block ms-4">Newsletter Subscription</h2>
                </div>

                <p class = "text-center text-muted">put your email if you want to receive some reduce</p>
                <div class = "input-group mb-3 mt-3">
                    <input type = "text" class = "form-control" placeholder="Enter Your Email ...">
                    <button class = "btn btn-primary" type = "submit">Subscribe</button>
                </div>
            </div>
        </div>
    </section>
    <!-- end of newsletter -->

    <!-- footer -->
    <footer class = "bg-dark py-5">
        <div class = "container">
            <div class = "row text-white g-4">

                <div class = "col ">
                    <h5 class = "fw-light mb-3">Contact Us</h5>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-map-marked-alt"></i>
                        </span>
                        <span class = "fw-light">
                            242 rue du faubourg saint-Antoine
                        </span>
                    </div>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-envelope"></i>
                        </span>
                        <span class = "fw-light">
                            audesandrine6@gmail.com
                        </span>
                    </div>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-phone-alt"></i>
                        </span>
                        <span class = "fw-light">
                            +33 0635963171
                        </span>
                    </div>
                </div>

                <div class = "col ">
                    <h5 class = "fw-light mb-3">Follow Us</h5>
                    <div>
                        <ul class = "list-unstyled d-flex">
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-pinterest"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end of footer -->




</body>
</html>