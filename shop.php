<?php 
 include('includes/head.php');
 include('includes/header.php');
include('includes/db.php');








?>
<!DOCTYPE html>

    <!-- navbar -->
  


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
                
                   
                <?php 
                            $getProduct = $bdd->query("SELECT * FROM product ORDER BY created_at DESC LIMIT 8");
                            while($product = $getProduct->fetch()){  
                                 var_dump($product);?>
                                <div class = "col-md-6 col-lg-4 col-xl-3 p-2 feat">
                                <form method="post" >

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

                                            <input type="submit" name="addCard" value="Add to Cart" class="btn btn-primary btn-sm btn-block" />
                                            <?php 

                                            if(isset($_POST['addCard']))
                                            {   
                                                $getid = $product['id'];
                                                
                                                var_dump($getid);
                                                    
                                            }

                                            ?>
                                         </div>
                                         
                                    </div>
                                </div>
                                
                                </form>
                                </div>
                          <?php
                            } ?>
                           

                            
            </div>

    
            </div>
        </div>
    </section>