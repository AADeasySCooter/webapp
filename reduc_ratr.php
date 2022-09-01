<?php 
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');
include('includes/function.php');

?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
  //recupère le total  envoyé en POST
    $total = $_POST['total'];
    $user_id = user_id();
    //1 € dépensé donne lieu à 0,3 points.
    if($total < 100){
        $points = $total * 0.3;
        //arrondir à l'entier supérieur ou inférieur
        $points = round($points);
        //recuperer le nombre de points dans la base de données et la mettre dans une variable
        $recupProfil = getUserById($user_id);
        $voirProfil =$recupProfil;
        $points_after = $voirProfil['point_ratr'] + $points;
        //update les points dans la table users 
        $succes = $bdd->exec( "UPDATE users SET point_ratr =$points_after  WHERE id = $user_id ;" );
        if($succes){
            http_response_code(201);
        }else{
            http_response_code(500);
        }

    }
    
    if($total == 0.01){
        $first_number = substr($total, 0, 1);

        $points = ($total * 0.3) + $first_number;
        //arrondir à l'entier supérieur ou inférieur
        $points = round($points);
        $recupProfil = getUserById($user_id);
        $voirProfil =$recupProfil;
        $points_after = $voirProfil['point_ratr'] + $points;
        //inserer les points dans la base de données
        $succes = $bdd->exec( "UPDATE users SET point_ratr =$points_after  WHERE id = $user_id ;" );
        if($succes){
            http_response_code(201);
        }else{
            http_response_code(500);
        }
    }


    
                








    





?>

