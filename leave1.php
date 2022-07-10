<?php 
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');
include('includes/function.php');


?>
<br><br><br><br><br>

<main>
<div class="container-fluid">
         <!--add div here-->
        <div class="row">
          <div class="col-md-12">
            <?php
                $id = $_GET['id'];
                getScooterById($id);
                /* if(isset($_GET['id']) && !empty($_GET['id'])){

                    //recuperer toute les donners de la table scooter
                    $q = 'SELECT * FROM scooter WHERE id = :id;';
                    $stmt = $bdd->prepare($q);
                    $statuss = $stmt->execute(
                        array(
                            'id'=>$_GET['id']
                        ));
                    if($statuss){
                        $plan = $stmt->fetch();
                    }
                }else{
                    
                    echo'Scooter not found error id ';
                
                
                } */


                //calculer le temps de la location en faisant la difference entre le temps actuel et le temps de la location(take_at)
                $date1 = date($plan['take_at']);
                $date2 = date('H:i:s', strtotime(' + 2 hours'));
                //convertir le temps en seconde
                $date1 = strtotime($date1);
                $date2 = strtotime($date2);
                //calculer la différence entre les deux temps
                $diff = $date2 - $date1;
                // pour 60 secondes on rajoute 0.25 pour le prix de la location  et calculer le prix total
                $prix = ($diff/60) * 0.25;
                $prix = (int)$prix;

                $test= 0.01;





 ?>






    <div class="container">
        <div class="row">
            <div class="course-col">
                
                <h4>payment methode </h4>
                                     <div id="smart-button-container">
                                        <div style="text-align: center;">
                                            <div id="paypal-button-container">

                                            <!--<form action="<?php // $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                                            <input type="submit" class="btn btn-secondary" name="submit" value="submit" class="btn btn">
                                            </form> -->

                                            </div>
                                        </div>
                                    </div>
                
            </div>
        </div>
    </div>
                <?php 
                 var_dump($date1);
                 var_dump($date2);
                 var_dump($diff);
                 var_dump($prix);



                ?>

                                     
                                        

                                      
                                    <script src="https://www.paypal.com/sdk/js?client-id=AQ3NsNMK2ULmNXhPR8ndLJvL5yeXYqY6ibCb5GmgPZNoPpp9JJZOSvy_l_fuAGVQbV4HaYqr-BJCO8Fy&enable-funding=venmo&currency=EUR" data-sdk-integration-source="button-factory"></script>



                                   <script>


                                         

                                        function initPayPalButton() {

                                            
                                        paypal.Buttons({
                                            style: {
                                            shape: 'rect',
                                            color: 'gold',
                                            layout: 'vertical',
                                            label: 'paypal',
                                            
                                            },
                                            
                             
                                            
                                                 
                        
                                            createOrder: function(data, actions) {

                                               

                                                

                                            return actions.order.create({
                                                purchase_units: [{"amount":{"currency_code":"EUR","value": <?= $test ;?>}}]
                                            });
                                            },

                                            onApprove: function(data, actions) {

                                                

                                               
                                                         
                                            return actions.order.capture().then(function(orderData) {
                                                
                                                // Full available details
                                                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                                                // Show a success message within this page, e.g.
                                                const element = document.getElementById('paypal-button-container');

                                                element.innerHTML = '';
                                                element.innerHTML = '<h3>Thank you for your payment!</h3>';
                                                //envoyer l'id de la trottinette a la page sve_plan.php  avec un post en ajax
                                                $.post('lv_plan.php',{id:<?= $plan['id'] ;?>},function(data){
                                                    console.log(data);
                                                });


                                                $.ajax({
                                                        type: 'POST',
                                                        url: 'lv_plan.php',
                                                        success: function(data) {
                                                            

                                                            //success code
                                                        }
                                                        });

                                                // Or go to another URL:  actions.redirect('thank_you.html');
                                                
                                            });
                                            },
                                            
                                            

                                            onError: function(err) {
                                                
                                            console.log(err);
                                            },

                                           


                                        }).render('#paypal-button-container');
                                        }
                                        initPayPalButton();
                        
                                    </script>
</main>