<?php
if(isset($_POST['addCard'])){
    session_start();

    if (isset($_SESSION["shopping_card"])){
        $product_array_id = array_column($_SESSION["shopping_card"],'id');

        if(!in_array($_GET["id"] , $product_array_id )){
            $count = count($_SESSION["shopping_card"]);
            $product_array = array(
                'id' =>$_GET["id"] ,
                'product_name' =>$_POST["hidden_name"],
                'product_description' =>$_POST["hidden_description"],
                'product_price' =>$_POST["hidden_price"],
                'product_quantity' =>$_POST["quantity"],
                'product_image' =>$_POST["hidden_image"],
            );
            $_SESSION["shopping_card"][$count] = $product_array;


        }else{
            echo'item already added';
        }

    }else{
        $product_array = array(
            'id' =>$_GET["id"] ,
            'product_name' =>$_POST["hidden_name"],
            'product_description' =>$_POST["hidden_description"],
            'product_price' =>$_POST["hidden_price"],
            'product_quantity' =>$_POST["quantity"],
            'product_image' =>$_POST["hidden_image"],
        );
        $_SESSION["shopping_card"][0] = $product_array;
    }
}

?>

    <!-- about us -->
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