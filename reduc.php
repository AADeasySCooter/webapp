<?php 
include('includes/head.php');
include('includes/db.php');
include('includes/function.php');

//si ton compte a été créé il y'a moins de 3jours tu bénéficies d'un code de réduction sur ton premier achat  

$user_id = user_id();
$voirProfil = getUserById($user_id);
$date_creation = $voirProfil['date_sign'];
$date_creation = strtotime($date_creation);
$date_creation = time() - $date_creation;
$date_creation = $date_creation / (60 * 60 * 24);
$date_creation = round($date_creation);
if($date_creation > 3){
    $reduction = 0;
}else{
    $reduction = 2;
}





    //add 10 points to user after a payment
    if (isset($_SESSION['email'])){
        $user_id = user_id();
        $recupProfil = getUserById($user_id);


        $points = $voirProfil['point'];
        
        $voirProfil =$recupProfil;

        $recupCart = getCartByUserID($user_id);
        $row = $recupCart;
        if($row > 0){
            $points = ($row * 10) ;
            $points = $points - $voirProfil['point_use'];
            //ajouter les points restants
            addPoint($user_id,$points);
         
        }
          

        

        
    }

    
    if(isset($_POST['Apply'])) {
       //recuperer le montant saisi par l'utilisateur et  le soustrait a son nombre de points
        
        $user_id = user_id();
        $voirProfil = getUserById($user_id);
        $points_use = $voirProfil['point_use'];
        $montant = $_POST['reduc']; 
        $points_use = $points_use + $montant;
        PointUse($user_id,$points_use);

     

    }

    $products = getCart();
    count($products);
    $count = count($products);
    $count = $count / 10;
    //arrondi si 0,5 to 1 et sinon si 0,4 to 0
    $count = round($count);
    //rajouter 25 points de fidélité  * $count

    $user_id = user_id();
    $voirProfil = getUserById($user_id);
    $points = $voirProfil['point'];
    $points = $points + ($count * 25);
    addPoint($user_id,$points);

  
  



?>