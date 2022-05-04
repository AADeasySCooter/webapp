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
                                <th>id</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Actions</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php   $getProduct = $bdd->query("SELECT * FROM articles "); 
                            
                            while($product = $getProduct->fetch()){ ?>
                            <tr>
                            

                                <td><?= $product['id'] ;?></td>
                                <td><?= $product['title'] ;?></td>
                                <td><?= $product['date_create'] ;?></td>
                                <td>61</td>
                               
                            
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
    