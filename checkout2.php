<?php 
error_reporting(0);
/* ini_set("display_errors", "1");
//creer une super globale error pour stocker error_reporting(E_ALL)
 error_reporting(E_ALL);
 $err =  error_reporting(E_ALL); */

//récuperer les errors que error_reporting(0)cache 






include('includes/head.php');
include('includes/header.php');
include('includes/db.php');
include('reduc.php');
//include('err.php');




$points_us = $_POST['reduc']; 

//convertir en argent $points_use pour 10 points = 1€
$points_us = $points_us / 10;
$points_us = round($points_us);

    
  

?>


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
                                    $response = $q->fetch();

                                     ?>
                                   
                                    
                                    <tr>
                                    <td><?= $response['address'] ;?></td>
                                    <td><?= $response['number'] ;?></td>
                                    <td><?= $response['code_postal'] ;?></td>
                                    <td><?= $response['ville'] ;?></td>


                                   
                                    </tr>
                                </table>
                                
                                    <table>
                                        <thead>
                                            <tr>
                                            <th>Point of reduce</th>
                                        </thead>
                                        <tbody>
                                            <form method="post">
                                                <tr>
                                                <td>
                                                    <input id ="quantity" type="number" name="reduc" placeholder="Enter your point of reduce">
                                                </td>
                                                <td>
                                                    <input class ="test" type="submit" value="Apply" name="Apply">
                                                </td>
                                                </tr>
                                            </form>

                                        </tbody>
                                    </table>
                                    <script>
                                        //faire un POST pour le formulaire Point de reduction quand on clique sur le bouton
                                        $('.test').on('change', function(){
                                            var quantity = $(this).val();
                                            var id = $(this).data('code');
                                            $.ajax({
                                                url: 'reduc.php',
                                                type: 'POST',
                                                data: {
                                                    quantity: quantity,
                                                    id: id
                                                },
                                                success: function(data){
                                                    location.reload();
                                                }
                                            });
                                        });
                                    </script>
                                    

       
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
                                <!--<td>
                                    <form method="POST" action="pdf.php">
                                    <button name="pdf_gen" href="receipt.php" class="btn btn-warning"></i> Download receipt</button>
                                    </form>
                                </td>-->
                                <?php 
                           

                                if(isset($total)) {

                                    //appliquer la reduction sur le total si reduction est supérieur à 0
                                    if($reduction > 0){

                                        $total = ($total - $reduction) ;
                                    }

                                    if($points_us  > 0){
                                        $total = ($total - $points_us) ;
                                    }

                                         //recuperer la colone money_ratr de la table users
                                    $q =$bdd->query(" SELECT * FROM users  WHERE email= '".$_SESSION['email']."' ");
                                    $response = $q->fetch();
                                    $money_ratr = $response['money_ratr'];
                                    if($money_ratr > 0 && $money_ratr < $total){
                                        $total = ($total - $money_ratr) ;
                                        $check =1;
                                    }else{
                                        $check =0;
                                    }
                                ?>	
                                      

                                <td class="text-center cart-products-total"><spans><spans> <?php if($reduction>0){echo "You have an Reduction of : ".$reduction."€";}  ?> </span></spans></br><strong>Total <?php echo $currency.sprintf("%01.2f",$total); ?></strong></td>

                        

                                    <td>

                                      <div id="smart-button-container">
                                        <div style="text-align: center;">
                                            <div id="paypal-button-container">

                                            <!--<form action="<?php // $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                                            <input type="submit" class="btn btn-secondary" name="submit" value="submit" class="btn btn">
                                            </form> -->

                                            </div>
                                        </div>
                                        </div>
                                        

                                      
                                    <script src="https://www.paypal.com/sdk/js?client-id=AQ3NsNMK2ULmNXhPR8ndLJvL5yeXYqY6ibCb5GmgPZNoPpp9JJZOSvy_l_fuAGVQbV4HaYqr-BJCO8Fy&enable-funding=venmo&currency=EUR" data-sdk-integration-source="button-factory"></script>



                                   <script>

                                   /*  $("#smart-button-container").click(function(e) {
                                            var form_data = $(this).serialize();
                                            $.ajax({
                                                url: "sve.php",
                                                type: "POST",
                                                dataType: "json",
                                                data: form_data
                                            }).done(function(data) {
                                                $("#cart-container").html(data.products);
                                            })
                                            e.preventDefault();
                                            window.location.reload();
                                        }); */
                                      

                                         

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
                                                 


                                                   


                                                     $.ajax({
                                                        type: 'POST',
                                                        url: 'sve.php',
                                                        success: function(data) {
                                                            //success code
                                                        }
                                                        });
 
                                                    
                                                    //delete the cart after payment 
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: 'delete_cart.php',
                                                        success: function(data) {
                                                            //success code
                                                        }
                                                        });

                                                    //post le la variable $total dans la page reduc_ratr.php
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: 'reduc_ratr.php',
                                                        data: {total: <?= $total ;?>},
                                                        success: function(data){
                                                           location.reload();
                                                               }
                                                        });
                                                    //post le la variable $check
                                                     $.ajax({
                                                        type: 'POST',
                                                        url: 'reduc_mon_ratr.php',
                                                        data: {total: <?= $check ;?>},
                                                        success: function(data){
                                                           location.reload();
                                                               }
                                                        });    



 

                                                // Or go to another URL:  actions.redirect('thank_you.html');
                                                
                                            });
                                            },
                                            
                                            

                                            onError: function(err) {
                                            console.log(err);
                                            },

                                           


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
        <?php 
        //var_dump($product);
       
       // echo "$user_id";
        $total_product = count($_SESSION["products"]);
        
        
       
       // var_dump(json_encode(array('products'=>$total_product)));


                
       



        ?>
    </section>
  