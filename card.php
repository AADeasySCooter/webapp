<?php 

include('includes/head.php');
include('includes/header.php');
include('includes/db.php');


?>

    <!-- about us --><br><br><br><br>
    <section id = "about" class = "py-5">
        <div class = "container">
       <div class="table-responsive">
                     <table class = "table table-bordered">
                         
                        <div class="text-left">					
                            <div class="col-md-8">
                                <h3>My Cart (<span id="cart-items-count"><?PHP if(isset($_SESSION["products"])){echo count($_SESSION["products"]); } ?></span>)</h3>			
                                <?php		
                                if(isset($_SESSION["products"]) && count($_SESSION["products"])>0) { 
                                ?>
                                    <table class="table" id="shopping-cart-results">
                                    <thead>
                                    <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th>Delete</th>
                                    <th>&nbsp;</th>
                                    
                                    </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                    $cart_box = '<ul class="cart-products-loaded">';
                                    $total = 0;
                                    foreach($_SESSION["products"] as $product){					
                                        $product_name = $product["product_name"]; 
                                        $product_price = $product["product_price"];
                                        $product_code = $product["product_code"];
                                        $product_qty = $product["product_qty"];				
                                        $subtotal = ($product_price * $product_qty);
                                        $total = ($total + $subtotal);
                                    ?>
                                    <tr>
                                    <td><?php echo $product_name;  ?></td>
                                    <td><?php echo $product_price; ?></td>
                                    <td><input type="number" data-code="<?php echo $product_code; ?>" class="form-control text-center quantity" value="<?php echo $product_qty; ?>"></td>
                                    <td><?php echo $currency; echo sprintf("%01.2f", ($product_price * $product_qty)); ?></td>
                                    <td>				
                                    <a href="#" class="btn btn-danger " data-code="<?php echo $product_code; ?>"><span class='bi bi-trash'></span></a>
                                    </td>
                                    </tr>
                                <?php } ?>
                                <tfoot>
                                <br>
                                <br>
                                <tr>
                                <td><a href="shop.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
                                <td colspan="2"></td>
                                <?php 
                                if(isset($total)) {
                                ?>	
                                      

                                <td class="text-center cart-products-total"><strong>Total <?php echo $currency.sprintf("%01.2f",$total); ?></strong></td>

                                <?php
                                   $getProduct = $bdd->query("SELECT id FROM users where email= '".$_SESSION['email']."'");
                    
                                    ($product = $getProduct->fetch()) ?>

                                <td><a href="checkout1.php?id=<?=$product['id'] ;?>" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>

                                
                                <?php } ?>
                                </tr>
                                </tfoot>			
                                <?php		
                                } else {
                                    echo "Your Cart is empty";
                                ?>
                                <tfoot>
                                <br>
                                <br>
                                <tr>
                                <td><a href="shop.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
                                <td colspan="2"></td>
                                </tr>
                                </tfoot>
                                <?php } ?>				
                                </tbody>
                                </table>			
                            </div>			
                        </div>

                     </table>
                   </div>
        </div>
    </section>

   