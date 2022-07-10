<?php 
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');
include('includes/function.php');

//recuperer l'email dans la session et reuperer l'id de l'utilisateur par rapport a l'email
/* $q = "SELECT * FROM users WHERE email= '".$_SESSION['email']."'";
$result = $bdd->prepare($q);
$result->execute();
$voirProfil =$result->fetch();
$user_id = $voirProfil['id']; */
$user_id = user_id();


?>
<br><br><br><br><br>

<main>
<div class="container-fluid">
         <!--add div here-->
        <div class="row">
          <div class="col-md-12">
            <?php  
                $id = $_GET['id'];
                getPlanById($id);

                
              /*   if(isset($_GET['id']) && !empty($_GET['id'])){

                    //recuperer toute les donners de la table product
                    $q = 'SELECT * FROM plan WHERE id = :id;';
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
                                                purchase_units: [{"amount":{"currency_code":"EUR","value": <?= getPlanById($id)['plan_price'] ;?>}}]
                                            });
                                            },

                                            onApprove: function(data, actions) {

                                                

                                               
                                                         
                                            return actions.order.capture().then(function(orderData) {
                                                
                                                // Full available details
                                                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                                                // Show a success message within this page, e.g.
                                                const element = document.getElementById('paypal-button-container');

                                                element.innerHTML = '';
                                                element.innerHTML = '<h3>Thank you for your payment! you have unluck the scooter !!</h3>';
                                                //envoyer l'id de la trottinette a la page sve_plan.php et le user_id  avec un post en ajax
                                                $.ajax({
                                                    type: "POST",
                                                    url: "sve_plan.php",
                                                    data: {
                                                        "id": <?= $_GET['id'] ;?>,
                                                        "user_id": <?= $user_id ;?>
                                                    },
                                                    success: () => {
                                                        console.log("data");
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
