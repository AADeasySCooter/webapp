<?php 
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');


?>
<!DOCTYPE html>

<br><br><br><br>
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
                                    <th>Delivery address</th>
                                    
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    
                                    </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                    $cart_box = '<ul class="cart-products-loaded">';
                                    $q =$bdd->query(" SELECT * FROM users  WHERE email= '".$_SESSION['email']."' ");
                                    $response = $q->fetch(); ?>
                                   
                                    
                                    <tr>
                                    <td><?= $response['address'] ;?></td>
                                    <td><?= $response['number'] ;?></td>
                                    <td><?= $response['code_postal'] ;?></td>
                                    <td><?= $response['ville'] ;?></td>

                                   
                                    </tr>
                                </table>             
       
                                    <table class="table" id="shopping-cart-results">
                                    <thead>
                                    <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th>&nbsp;</th>
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
                                    
                                    </tr>
                                <?php } ?>
                                <tfoot>
                                <br>
                                <br>
                                <tr>
                                <td><a href="shop.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
                                <td colspan="2"></td>
                                <td><a href="receipt.php" class="btn btn-warning"></i> Download receipt</a></td>
                                <?php 
                                if(isset($total)) {
                                ?>	
                                      

                                <td class="text-center cart-products-total"><strong>Total <?php echo $currency.sprintf("%01.2f",$total); ?></strong></td>

                        

                                    <td>
                                      <div id="smart-button-container">
                                        <div style="text-align: center;">
                                            <div id="paypal-button-container"></div>
                                        </div>
                                        </div>
                                    <script src="https://www.paypal.com/sdk/js?client-id=AQ3NsNMK2ULmNXhPR8ndLJvL5yeXYqY6ibCb5GmgPZNoPpp9JJZOSvy_l_fuAGVQbV4HaYqr-BJCO8Fy&enable-funding=venmo&currency=EUR" data-sdk-integration-source="button-factory"></script>
                                    <script>
                                        function initPayPalButton() {
                                        paypal.Buttons({
                                            style: {
                                            shape: 'rect',
                                            color: 'gold',
                                            layout: 'vertical',
                                            label: 'paypal',
                                            
                                            },

                                            createOrder: function(data, actions) {
                                            return actions.order.create({
                                                purchase_units: [{"amount":{"currency_code":"EUR","value": <?= $total ;?>}}]
                                            });
                                            },

                                            onApprove: function(data, actions) {
                                            return actions.order.capture().then(function(orderData) {
                                                
                                                // Full available details
                                                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                                                // Show a success message within this page, e.g.
                                                const element = document.getElementById('paypal-button-container');
                                                element.innerHTML = '';
                                                element.innerHTML = '<h3>Thank you for your payment!</h3>';

                                                // Or go to another URL:  actions.redirect('thank_you.html');
                                                
                                            });
                                            },

                                            onError: function(err) {
                                            console.log(err);
                                            }
                                        }).render('#paypal-button-container');
                                        }
                                        initPayPalButton();
                                    </script>
                                    </td>
                                
                                 <!-- <td><a href="checkout1.php" class="btn btn-success btn-block">Payment <i class="glyphicon glyphicon-menu-right"></i></a></td>-->

                                
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