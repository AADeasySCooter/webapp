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
                                 ?>
                                <div class = "col-md-6 col-lg-4 col-xl-3 p-2 feat">
                                <form method="post" action="shop.php?action=add&id=<?php echo $product["id"]; ?>" >

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
                                            <!--<input  type="text"  class="form-control" name="quantity" value="1"/>-->
                                            <input type="submit" name="addCard" value="Add to Cart" class="btn btn-primary btn-sm btn-block" />
                                            <input type="hidden"   name="hidden_image" value="<?=  $product['product_image'] ;?>"/>
                                            <input type="hidden" name="hidden_name" value="<?= $product['product_name'] ;?>" />
                                            <input  type="hidden"   name="hidden_description" value="<?=  $product['product_description'] ;?>"/>
                                            <input type="hidden" name="hidden_price" value="<?=  $product['product_price'] ;?>"  />
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

            <section id = "about" class = "py-5">
        <div class = "container">
       <div class="table-responsive">
                     <table class = "table table-bordered">
                         <tr>
                             <th width = "40%">Product Name</th>
                             <th width = "10%">Quantity</th>
                             <th width = "20%">Price</th>
                             <th width = "15%">Total</th>
                             <th width = "5%">Action</th>

                         </tr>
                         <?php
                            if(empty($_SESSION["shopping_card"])){ 

                                $total = 0;
                                foreach($_SESSION["shopping_card"] as $key => $values){
                                    ?> 
                                        <tr>
                                            <td><?= $values['product_name'] ;?></td>
                                            <td><?= $values['product_quantity'] ;?></td>
                                            <td><?= $values['product_price'] ;?></td>
                                            <td><?= number_format($values['product_name'] * $values['product_price'], 2)  ;?></td>
                                            <td><a href="card.php?action=deleted&id=<?= $values['id'] ;?>"></a></td>


                                        </tr>
                                    
                                    <?php
                                            $total = $total + ($values["product_quantity"] * $values["product_price"]);

                                }
                                ?>
                                            <td colspan ="3" align="right" >Total</td>
                                            <td align='right'><?= number_format($total, 2)  ;?> </td>
                                            <td><?= $values['product_price'] ;?></td>
                                
                                <?php
                            }

                         ?>

                     </table>
                   </div>
        </div>
    </section>

    
            </div>
        </div>
    </section>