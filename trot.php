<?php 
 include('includes/head.php');
 include('includes/header.php');
include('includes/db.php');









?>


    <!-- navbar -->
  


<section id = "collection" class = "py-5">
        <div class = "container">
            <div class = "title text-center">
                <h2 class = "position-relative d-inline-block"> Collection</h2>
            </div>
           

            <!--<div class = "row g-0">
                <div class = "d-flex flex-wrap justify-content-center mt-5 filter-button-group">
                    <button type = "button" class = "btn m-2 text-dark active-filter-btn" data-filter = "*">All</button>
                    <button type = "button" class = "btn m-2 text-dark" data-filter = ".best">Best Sellers</button>
                    <button type = "button" class = "btn m-2 text-dark" data-filter = ".feat">Featured</button>
                    <button type = "button" class = "btn m-2 text-dark" data-filter = ".new">New Arrival</button>
                </div>-->

            <div class = "collection-list mt-4 row gx-0 gy-3">

                    
                
                   
                <?php 
                            $getscooter = $bdd->query("SELECT * FROM scooter ORDER BY created_at DESC ");
                            while($scooter = $getscooter->fetch()){  
                                 ?>
                                <div class = "col-md-6 col-lg-4 col-xl-3 p-2 feat">
                                <form class="scooter-form">

                                <div class="card mb-2">
                                    <div class = "collection-img position-relative">
                                    <?php echo '<img src="images/' . $scooter['scooter_image'] . '" alt="Image du produit" class = "w-100"   >' ?>
                                    </div>
                                    <div class = "text-center">
                                            
                                        <div class = "rating mt-3">
                                            <span class = "text-primary"><i class = "fas fa-star" style = "color:#dc3545"></i></span>
                                            <span class = "text-primary"><i class = "fas fa-star" style = "color:#dc3545"></i></span>
                                            <span class = "text-primary"><i class = "fas fa-star" style = "color:#dc3545"></i></span>
                                            <span class = "text-primary"><i class = "fas fa-star" style = "color:#dc3545"></i></span>
                                            <span class = "text-primary"><i class = "fas fa-star" style = "color:#dc3545"></i></span>
                                        </div>
                                        <p class = "text-capitalize my-1"><?= $scooter['scooter_name'] ;?></p>
                                         <div class="col-md-6">
                                       

                                            
        


                                            <input name="scooter_code" type="hidden" value="<?php echo $scooter["scooter_code"]; ?>">
                                            <input name="scooter_image" type="hidden" value="<?php echo $scooter["scooter_image"]; ?>">
                                            <input name="scooter_name" type="hidden" value="<?php echo $scooter["scooter_name"]; ?>">
                                            <input name="scooter_status" type="hidden" value="<?php echo $scooter["scooter_status"]; ?>">
                                          
                                           

                                            <!--  afficher un boutton vert si status = 1 -->

                                            <?php if($scooter["scooter_status"] == 1){ ?>
                                

                                            <button  class="btn btn-primary  " type="submit">Use</button>

                                            <button  class="btn btn-success  " type="submit">Available🟢</button>
                                            <?php }else{ ?>
                                            <button  class="btn btn-danger  " type="submit">Not Available 🔴</button>
                                            <?php } ?>


                                           

                                            <?php 

                                            
                                            ?>
                                         </div>
                                         
                                    </div>
                                </div>
                                
                                </form>
                                </div>
                          <?php
                            } ?>
                           

                            
            </div>

           

    
            </div>
        </div>
        <?php 
        var_dump($_SESSION);
        ?>
    </section>