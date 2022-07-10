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
                        <span><i class="bi bi-table me-2"></i></span> Products
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
                                
                                <th>Name</th>
                                <th>Description</th>
                                <th>price</th>
                                <th>Actions</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php   $getProduct = $bdd->query("SELECT * FROM plan ORDER BY created_at "); 
                            
                            while($product = $getProduct->fetch()){ ?>
                            <tr id = "<?php echo $product['id']; ?>">
                            

                                
                                <td data-target="plan_title"><?= $product['plan_title'] ;?></td>
                                <td data-target="plan_description"><?= $product['plan_description'] ;?></td>
                                <td data-target="plan_price"><?= $product['plan_price'] ;?></td>
                                <td> <a type="submit" class="btn btn-primary" href="updatePlan.php?id=<?=$product['id'] ;?>" target="_blank"> UPDATE </td>
                                <td> <a type="submit" class="btn btn-danger" href="DeletePlan.php?id=<?=$product['id'] ;?>" target="_blank"> DELETE </td>
                               
                               
                            
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