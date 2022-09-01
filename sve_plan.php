<?php 
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');



//changer le status de l'id récupéré en paramètre de la page en 3
$id = $_POST['id'];
$user_id = $_POST['user_id'];
$qq = "UPDATE  scooter SET  scooter_status=3 , user_id =$user_id, done_at =DATE_ADD(NOW(), INTERVAL 2 HOUR)  , take_at =CURRENT_TIMESTAMP WHERE id= $id ";
$req = $bdd->prepare($qq);
$req->execute();    
    




