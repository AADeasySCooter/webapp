<?php 
 include('includes/head.php');
 include('includes/header.php');
include('includes/db.php');




?>

</br><br>
<main class="mt-5 ">
     <div class="container-fluid">
         <!--add div here-->
        <div class="row">
          <div class="col-md-12">
            <?php
                if(isset($_GET['id']) && !empty($_GET['id'])){

                    //recuperer toute les donners de la table product
                    $q = 'SELECT * FROM product WHERE id = :id;';
                    $stmt = $bdd->prepare($q);
                    $statuss = $stmt->execute(
                        array(
                            'id'=>$_GET['id']
                        ));
                    if($statuss){
                        $product = $stmt->fetch();
                    }
                }else{
                    
                    echo'Product not found error id ';
                
                
                }




 ?>
            <!--afficher l'image du produit à gauche -->
            <div class="col-md-12">
                <img src="./images/<?php echo $product['product_image']; ?>" class="img-fluid" width="400" 
     height="500" alt="">

            </div>
            <!--afficher les donners du produit à droite -->
            <div class="col-md-6">
                <h4><?php echo $product['product_name']; ?></h4>
                <p><?php echo $product['product_description']; ?></p>
                <p>Price: <?php echo $product['product_price']; ?>$</p>
            </div>    
            <!-- bouton retour au shop -->
            <div class="col-md-12">
                <a href="shop.php" class="btn btn-primary">Back to shop</a>
            </div>

            <!--afficher les donners du produit à droite avec bootsrap-->

           
        </div>
        

   
    </div>
    </main>
    


