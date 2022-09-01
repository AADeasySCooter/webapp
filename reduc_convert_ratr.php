<?php 
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');
include('includes/function.php');

?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php 
$user_id = user_id();
//recuperer la quantity en POST
$quantity = $_POST['quantity'];
//convertir les points en euros 1 point vaut 0,2 €
$points = $quantity * 0.2;
//recuperer la colone point_ratr de la table users
$recupProfil = getUserById($user_id);
$voirProfil =$recupProfil;
$pointss = $voirProfil['point_ratr'];
if($quantity >= $pointss){
    http_response_code(500);
}else{
    $points_after = $quantity - $voirProfil['points_ratr'];
    $succes = $bdd->exec( "UPDATE users SET point_ratr =$points_after  WHERE id = $user_id ;" );
    //inserer l'argent dans la base de données
    $money_after = $voirProfil['money_ratr'] + $points;
    $succes = $bdd->exec( "UPDATE users SET money_ratr =$money_after  WHERE id = $user_id ;" );

}




