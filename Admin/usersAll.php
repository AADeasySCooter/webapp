<?php
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');


?>

<!DOCTYPE html>

<main class="mt-5 pt-3">
     <div class="container-fluid">
         <!--add div here-->
        <div class="row">
          <div class="col-md-12">
            <h4>Dashboard</h4>
          </div>
        </div>
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
                            style="width: 100%" >
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Actions</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php  
                                $products = getUsers();
                                foreach($products as $product){ ?>

                            <tr>
                            

                                <th scope="row"><?= $product['id'] ;?></th>
                                <td><?= $product['firstname'] ;?></td>
                                <td><?= $product['email'] ;?></td>
                                <td> <a type="submit" class="btn btn-primary" href="updateUser.php?id=<?=$product['id'] ;?>" target="_blank"> UPDATE </td>
                                <td> <a type="submit" class="btn btn-danger" href="DeleteUser.php?id=<?=$product['id'] ;?>" target="_blank"> DELETE </td>
                                 
                                
                               
                            
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
    