<?php 
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');
include('includes/function.php');

?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php 
$user_id = user_id();
//recuperer la valeur de check en POST
$check = $_POST['check'];
if($check = 1){
    //update la colone money_ratr de la table users à 0
    $succes = $bdd->exec( "UPDATE users SET money_ratr =0  WHERE id = $user_id ;" );

}
