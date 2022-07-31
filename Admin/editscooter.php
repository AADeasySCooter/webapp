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
                        <span><i class="bi bi-table me-2"></i></span> scooters
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
                                <th>status</th>
                                <th>Code</th>
                                <th>Actions</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php   $getscooter = $bdd->query("SELECT * FROM scooter ORDER BY created_at "); 
                            
                            while($scooter = $getscooter->fetch()){ ?>
                            <tr id = "<?php echo $scooter['id']; ?>">
                            

                                
                                <td data-target="scooter_name"><?= $scooter['scooter_name'] ;?></td>
                                <td data-target="scooter_status"><?= $scooter['scooter_status'] ;?></td>
                                <td data-target="scooter_code">><?= $scooter['scooter_code'] ;?></td>
                                <td> <a type="submit" class="btn btn-primary" href="updatescooter.php?id=<?=$scooter['id'] ;?>" target="_blank"> UPDATE </td>
                                <td> <a type="submit" class="btn btn-secondary" href="../showtrot.php?id=<?=$scooter['id'] ;?>" target="_blank"> VIEW </td>
                                <td> <a type="submit" class="btn btn-danger" href="Deletescooter.php?id=<?=$scooter['id'] ;?>" target="_blank"> DELETE </td>
                               
                               
                            
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