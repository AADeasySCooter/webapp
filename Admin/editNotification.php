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
                        <span><i class="bi bi-table me-2"></i></span> Notification
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
                                <th>title</th>
                                <th>Description</th>
                                <th>Actions</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php   $getProduct = $bdd->query("SELECT * FROM notification "); 
                            
                            while($product = $getProduct->fetch()){ ?>
                            <tr>
                            

                                <td><?= $product['id'] ;?></td>
                                <td><?= $product['title'] ;?></td>
                                <td><?= $product['description'] ;?></td>
                                <td> <a type="submit" class="btn btn-primary" href="updateNotificatio.php?id=<?=$product['id'] ;?>" target="_blank"> UPDATE </td>
                                <td> <a type="submit" class="btn btn-danger" href="DeleteNotification.php?id=<?=$product['id'] ;?>" target="_blank"> DELETE </td>
                               
                            
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
    