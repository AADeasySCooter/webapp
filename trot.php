
<?php 
 include('includes/head.php');
 include('includes/header.php');
include('includes/db.php');


  //afficher la date d'aujourd'hui et l'heure actuelle
  $time = date('H:i:s' , strtotime(' + 2 hours'));
  $date_time =  ' ' . $time;

//recuperer l'email dans la session et reuperer l'id de l'utilisateur par rapport a l'email
$q = "SELECT * FROM users WHERE email= '".$_SESSION['email']."'";
$result = $bdd->prepare($q);
$result->execute();
$voirProfil =$result->fetch();
$user_id = $voirProfil['id'];

?>

<br><br><br><br>
    <!-- navbar -->
  


<section id = "collection" class = "py-5">
        <div class = "container">
            <div class = "title text-center">
                <h2 class = "position-relative d-inline-block"> Scooter</h2>
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
                                <form class="scooter-form" name="form1" method="post" action="trot.php">

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
                                            <input name="scooter_status" type="hidden" value="<?php echo $scooter["done_at"]; ?>">
                                          
                                           
                                            <?php
                                             

                                                
                                                  $NULL = NULL;

                                                    if(($date_time > $scooter["done_at"])&& $scooter["done_at"] === $NULL){
                                                        //changer le status du scooter et mettre à null done_at
                                                        $update = $bdd->prepare("UPDATE scooter SET scooter_status = '1' WHERE id = '".$scooter['id']."'");
                                                        $update->execute();
                                                        $updatee = $bdd->prepare("UPDATE scooter SET done_at = NULL WHERE id = '".$scooter['id']."'");
                                                        $updatee->execute();
                                                        $updateee = $bdd->prepare("UPDATE scooter SET take_at = NULL WHERE id = '".$scooter['id']."'");
                                                        $updateee->execute();
                                                
                                                    }
                
                                                
                                                
                                                
                                            
                                             ?>
                                            <!--  afficher un boutton vert si status = 1 -->

                                            <?php if($scooter["scooter_status"] == 1){ 
                                                echo" <a href='showtrot.php?id=".$scooter['id']."' class='btn btn-info'> Use</a> ";
                                                //build a button with redirect page home with ajax
                                                ?>
                                            <p  type="submit">Available🟢</p>
                                            <?php }else{ ?>
                                            <p   type="submit">Not Available 🔴</p>
                                            <?php } ?>

                                            <?php if ($scooter['user_id'] == $user_id){
                                                echo" <a href='showtrot.php?id=".$scooter['id']."' class='btn btn-info'>leave </a> ";



                                            } ?>


                                           

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
            <div class="test">

            </div>

           

    
            </div>
        </div>
        <?php 
        var_dump($_SESSION);
        echo count($_POST);
        var_dump($date_time);


    

        ?>

    </section>

    <script>
       //faire un post de la page à chaque fois qu'elle recharge
        $(document).ready(function(){
            $.ajax({
                type: "POST",
                url: "trot.php",
                data: {
                    "action": "refresh"
                },
                success: () => {
                    console.log("refresh");
                }
            });
        });


    </script>
  