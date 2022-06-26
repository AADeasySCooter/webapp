<?php 
 include('includes/head.php');
 include('includes/header.php');
include('includes/db.php');

//si le code dans le formulaire est différent de celui dans la base de données alors on affiche un message d'erreur







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
                    $q = 'SELECT * FROM scooter WHERE id = :id;';
                    $stmt = $bdd->prepare($q);
                    $statuss = $stmt->execute(
                        array(
                            'id'=>$_GET['id']
                        ));
                    if($statuss){
                        $scooter = $stmt->fetch();
                    }
                }else{
                    
                    echo'Scooter not found error id ';
                
                
                }



 ?>
            <!--afficher l'image du produit à gauche -->
            <div class="col-md-12"><br>
                <img src="./images/<?php echo $scooter['scooter_image']; ?>" class="img-fluid" width="400" 
     height="500" alt="">

            </div>
            <!--afficher les donners du produit à droite -->
            <div class="col-md-3">
                <h3><?php echo $scooter['scooter_name']; ?></h3>
                <p>You can use the code of the scooter for unlock it</p>
                <p>CODE:</p> 

                <form>
                    <div class="form-group">
                        <input type="text" name="code_input" class="form-control" id="Input1" aria-describedby="code" placeholder="Enter code">
                        <input type="hidden" name="id" value="<?php echo $scooter['id']; ?>">
                        <input type="hidden" name="code" value="<?php echo $scooter['scooter_code']; ?>">
                    </div>
                    <div id="alert" style="display: none ;">
                     </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>


                <p>Status:  <?php  if ($scooter['scooter_status'] == 1) { 
                    echo 'Available';
                }
                                    ?></p>
            </div>    
            <!-- bouton retour au shop -->
            <div class="col-md-12">
                <a href="trot.php" class="btn btn-primary">Back to scooter</a>
            </div>
            <!--cache la div avec l'id test -->

            


            <div id="test" style="display: none ;">



            <?php
            $getProduct = $bdd->query("SELECT * FROM plan ORDER BY created_at DESC ");
                            while($plan = $getProduct->fetch()){  
                                 ?>
            <section id = "newsletter" class = "py-5">
          
            <div class="tab-content pricing-tab-content" id="pricing-tab-content">
                <div class="tab-pane active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                <div class="row">
                    <div class="col-md-4">
                    <div class="card pricing-card">
                        <div class="card-body">
                        <h3 class="pricing-plan-title d-flex align-items-center"><?=  $plan['plan_title'] ;?> <!--<span class="badge badge-pill offer-badge ml-auto">20% off</span>--></h3>
                        <p class="h1 pricing-plan-original-cost">€<?=  $plan['plan_price'] ;?></p>
                        <ul class="pricing-plan-features">
                            <li><?=  $plan['plan_description'] ;?></li>
                        </ul>
                        <?php 
                        //ouvrir une autre page avec le id du produit
                        echo" <a href='offer1.php?id=".$scooter['id']."' class='btn btn-info'> Get started</a> ";

                        ?>
                       
                        </div>
                    </div>
                    </div>
                 
                 </div>
                </div>
                </div>
            </div>
            </section>

            <?php } ?>
            


     



           
        </div>
        

        

   
    </div>
    </main>

    <script>

       //verifier si le code entrer dans le formulaire est égal au code dans le 
       //input hidden code si oui alors on affiche le message de succes sinon on affiche le message d'erreur
        $('form').submit(function(e){
            e.preventDefault();
            var code = $('input[name="code"]').val();
            var code_input = $('input[name="code_input"]').val();
            var id = $('input[name="id"]').val();
            if(code == code_input){
                //afficher la div test
                $('#test').show();
                
            }else{
                //ajouter un message dans la div  class="col-md-3" et afficher le message d'erreur en rouge qui s'éfface au bout de 3 secondes
                $('#alert').html('<p style="color:red;">Code incorrect</p>');
                $('#alert').show();
                setTimeout(function(){
                    $('#alert').hide();
                },3000);

            }
        });
    </script>
    


