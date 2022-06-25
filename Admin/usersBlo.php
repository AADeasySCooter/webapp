<?php 
 include('includes/db.php');
 include('includes/head.php');
 include('includes/header.php');



 ?>
 <!DOCTYPE html>

 <main class="mt-5 pt-3">
     <div class="container-fluid">
         <!--add div here-->
        
        <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> USERS
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table
                            id="example"
                            class="table table-striped data-table"
                            style="width: 100%"
                        >
                            <thead>
                            <tr>
                                
                                <th>id</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Actions</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php   $getProduct = $bdd->query("SELECT * FROM users  WHere status = '3'"); 
                            
                            while($product = $getProduct->fetch()){ ?>
                            <tr id = "<?php echo $product['id']; ?>">
                            

                                
                                <td data-target="product_name"><?= $product['id'] ;?></td>
                                <td data-target="product_price"><?= $product['firstname'] ;?></td>
                                <td data-target="product_description"><?= $product['lastname'] ;?></td>
                                <td> <a type="submit" class="btn btn-primary" href="updateUser.php?id=<?=$product['id'] ;?>" target="_blank"> UPDATE </td>
                               
                               
                            
                            </tr>
                            <?php
                                
                            } ?>
                            </tbody>
                            
                        </table>
                            
                                    
                                    
                        </div>
                    </div>
                    </div>
                </div>
                
        </div>
       
    </div>

    </main>