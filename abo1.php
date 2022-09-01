<?php 
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');
include('reduc.php');
?>
<br><br><br><br><br><br><br><br>
<h1>payment for 8 trips</h1>
<div id="paypal-button-container-P-76X28080FU695962DMMHI3XI"></div>
<script src="https://www.paypal.com/sdk/js?client-id=AQ3NsNMK2ULmNXhPR8ndLJvL5yeXYqY6ibCb5GmgPZNoPpp9JJZOSvy_l_fuAGVQbV4HaYqr-BJCO8Fy&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
<script>
  paypal.Buttons({
      
      style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'subscribe'
      },
      
      createSubscription: function(data, actions) {
        
        return actions.subscription.create({
          /* Creates the subscription */
          plan_id: 'P-76X28080FU695962DMMHI3XI'
        });
        

      },
      onApprove: function(data, actions) {  
       
        const element = document.getElementById('paypal-button-container-P-76X28080FU695962DMMHI3XI');

        element.innerHTML = '';
        element.innerHTML = '<h3>Thank you for your payment!</h3>';
        $.ajax({
            type: 'POST',
            url: 'validabo1.php',
            success: function(data) {
                //success code
              }
         });
        //alert(data.subscriptionID); // You can add optional success message for the subscriber here
      }
  }).render('#paypal-button-container-P-76X28080FU695962DMMHI3XI'); // Renders the PayPal button
</script>