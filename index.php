<?php 

include('includes/head.php');
include('includes/header.php');
include('includes/db.php');
include('includes/function.php');

/* translate($_SESSION['lang']);
 */



?>
<!DOCTYPE html>



    <!-- navbar -->
    
    

    <!-- end of navbar -->
     <!-- Visible only if logged in -->
     <?php include('includes/message.php'); ?>
    

    <!-- header -->
    <br><br><br><br>
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
                            $products = getProduct();
                            foreach( $products as $product){ ?>
                                <div class = "col-md-6 col-lg-4 col-xl-3 p-2 feat">
                                <form class="product-form">

                                <div class="card mb-2">
                                    <div class = "collection-img position-relative">
                                    <?php echo '<img src="images/' . $product['product_image'] . '" alt="Image du produit" class = "w-100"  >' ?>
                                    </div>
                                    <div class = "text-center">
                                            
                                        <div class = "rating mt-3">
                                            <span class = "text-primary"><i class = "fas fa-star" style = "color:#dc3545"></i></span>
                                            <span class = "text-primary"><i class = "fas fa-star" style = "color:#dc3545"></i></span>
                                            <span class = "text-primary"><i class = "fas fa-star" style = "color:#dc3545"></i></span>
                                            <span class = "text-primary"><i class = "fas fa-star" style = "color:#dc3545"></i></span>
                                            <span class = "text-primary"><i class = "fas fa-star" style = "color:#dc3545"></i></span>
                                        </div>
                                        <p class = "text-capitalize my-1"><?= $product['product_name'] ;?></p>
                                        <span class = "fw-bold">€ <?=  $product['product_price'] ;?></span>
                                         <div class="col-md-6">
                                        <!--<div class="cart-action">
                                             <input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                                             <input type="submit" value="Add to Cart" class="btnAddAction" /></div>
		                                 </div>-->
                                            <!--<button type="button"
                                                class="btn btn-primary btn-sm btn-block"
                                                id="addToCart-1" onclick="addToCart(1)">
                                                <span class="glyphicon glyphicon-shopping-cart"
                                                    aria-hidden="true"></span> ADD TO CART
                                            </button>-->
                                            <!--<input  type="text"  class="form-control" name="quantity" value="1"/>-->

                                            
                                            <div>
                                            Qty :
                                            <select name="product_qty">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            </select>
                                            </div>


                                            <input name="product_code" type="hidden" value="<?php echo $product["product_code"]; ?>">
                                            <button  class="btn btn-primary btn-sm btn-block" type="submit">Add to Cart</button>
                                           

                                            <?php 

                                            
                                            ?>
                                         </div>
                                         
                                    </div>
                                </div>
                                
                                </form>
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
    
  
    <!-- end of special products -->

    <!-- blogs -->
    <section class="vh-40" style="background-color: #4B515D;">
  <div class="container py-5 h-100">

        <?php 
         /*      $getWeather = $connn->query("SELECT * FROM weather_report");
          $weather = $getWeather->fetch(); */
          //recuperer le temps actuelle et lui rajouter  2h
          $weather_report = getWeatherReport();
          $current_time = date('H:i', strtotime(' + 2 hours'));
           $weather_id = $weather_report['id_geolocation'];
            $weather_temp = $weather_report['temp'];
            $weather_desc = $weather_report['description'];
            $weather_pressure = $weather_report['pressure'];
            $weather_humidity = $weather_report['humidity'];
            $weather_wind_speed = $weather_report['wind_speed'];

           ?>

            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-md-8 col-lg-6 col-xl-4">

                <div class="card" style="color: #4B515D; border-radius: 35px;">
                  <div class="card-body p-4">

                    <div class="d-flex">
                      <h6 class="flex-grow-1"> <?= $weather_desc ; ?> </h6>
                      <h6> <?= $current_time ; ?></h6>
                    </div>

                    <div class="d-flex flex-column text-center mt-5 mb-4">
                      <h6 class="display-4 mb-0 font-weight-bold" style="color: #1C2331;"> <?= $weather_temp ?>°C </h6>
                      <span class="small" style="color: #868B94"><?= $weather_desc ; ?></span>
                    </div>

                    <div class="d-flex align-items-center">
                      <div class="flex-grow-1" style="font-size: 1rem;">
                        <div><i class="fas fa-wind fa-fw" style="color: #868B94;"></i> <span class="ms-1"> <?= $weather_wind_speed; ?> m/s</span></div>
                        <div><i class="fas fa-tint fa-fw" style="color: #868B94;"></i> <span class="ms-1"> <?= $weather_humidity ?> %</span>
                        </div>
                        <div><i class="fas fa-sun fa-fw" style="color: #868B94;"></i> <span class="ms-1"> 0.2h </span>
                        </div>
                      </div>
                      <div>
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-weather/ilu1.webp"
                          width="100px">
                      </div>
                    </div>

                  </div>
                </div>

              </div>
            </div>

  </div>
</section>
  
 
    <section id = "blogs" class = "py-5">
        <div class = "container">
            <div class = "title text-center py-5">
                <h2 class = "position-relative d-inline-block">Article</h2>
            </div>

            <div class = "collection-list mt-5 row gx-0 gy-3">

                <?php 
                
                $Articles = getArticle();
                foreach( $Articles as $article){
                   ?>
                  
                  <div class = "col-md-6 ">
                      <div class="mb-2">
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
                                <!--<a href = "#" class = "btn">Read More</a> -->
                            </div>
                      </div>
                  </div>


                </div>
                    <?php
                    } ?>

            </div>
        </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="course-col">
              <?php
            



              
              ?>
            <!--afficher la carte de lyon avec du javascript-->
                 
          </div>
        </div>
      </div>

                 
    </section>




    

    <!-- about
    <section id = "about" class = "py-5">
        <div class = "container">
        <?php 
                 $about = getAbout();
                {
               ?>

            <div class = "row gy-lg-5 align-items-center">
                <div class = "col-lg-6 order-lg-1 text-center text-lg-start">
                    <div class = "title pt-3 pb-5">
                        <h2 class = "position-relative d-inline-block ms-4"><?= $about['title'] ;?></h2>
                    </div>
                    <p class = "lead text-muted"><?= $about['description'] ;?></p>
                    <p><?= $about['description2'] ;?></p>
                </div>
                <div class = "col-lg-6 order-lg-0">
                    <?php echo '<img src="images/' . $about['image'] . '" alt="Image du produit" class = "img-fluid"  >' ?>
                </div>
            </div>
            <?php
                 } ?>
        </div>
    </section>
    of about us -->

    <!-- footer -->
    <footer class = "bg-dark py-5">
        <div class = "container">
            <div class = "row text-white g-4">

                <div class = "col ">
                    <h5 class = "fw-light mb-3"><a href="contact.php" class="link-light" style="text-decoration: none ;">Contact Us</a></h5>
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
        <div id="scrollUp">
        <a href="#top"><img src="images/to_top.png"/></a>
        </div>
    </footer>
    <!-- end of footer -->


</body>
</html>

