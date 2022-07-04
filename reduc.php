<?php 
include('includes/head.php');
include('includes/db.php');

//si ton compte a été créé il y'a moins de 3jours tu bénéficies d'un code de réduction sur ton premier achat  
$recupProfil =$bdd->prepare("SELECT * FROM users WHERE email= '".$_SESSION['email']."'");
$recupProfil->execute();
$voirProfil =$recupProfil->fetch();
$user_id = $voirProfil['id'];
$date_creation = $voirProfil['date_sign'];
$date_creation = strtotime($date_creation);
$date_creation = time() - $date_creation;
$date_creation = $date_creation / (60 * 60 * 24);
$date_creation = round($date_creation);
if($date_creation < 3){
    $reduction = 0;
}else{
    $reduction = 2;
}




    //add 10 points to user after a payment
    if (isset($_SESSION['email'])){
        $recupProfil =$bdd->prepare("SELECT * FROM users WHERE email= '".$_SESSION['email']."'");     
        $recupProfil->execute();
        $user_id = $voirProfil['id'];
        $points = $voirProfil['point'];
        $recupCart =$bdd->prepare("SELECT * FROM  cart WHERE user_id=  $user_id");   
        $recupCart->execute();
        $voirProfil =$recupProfil->fetch();
        //compt row of cart
        $row = $recupCart->rowCount();
        if($row > 0){
            $points = ($row * 10) ;
            $points = $points - $voirProfil['point_use'];
            //ajouter les points restants
            $recupCart =$bdd->prepare("UPDATE users SET point = $points WHERE id = $user_id");
            $recupCart->execute();
        }
          

        

        
    }

    
    if(isset($_POST['Apply'])) {
       //recuperer le montant saisi par l'utilisateur et on le soustrait a son nombre de points
        $recupProfil =$bdd->prepare("SELECT * FROM users WHERE email= '".$_SESSION['email']."'");     
        $recupProfil->execute();
        $voirProfil =$recupProfil->fetch();
        $user_id = $voirProfil['id'];
        $points_use = $voirProfil['point_use'];
        $montant = $_POST['reduc']; 
        $points_use = $points_use + $montant;
        $updatePoints = $bdd->prepare("UPDATE users SET point_use = $points_use WHERE id = $user_id");
        $updatePoints->execute();

    }

?>