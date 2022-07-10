<?php 
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');
include('includes/function.php');
//update le status de la trot à 1 enlever le user_id et done_at et take_at
/* $qq = " UPDATE  scooter SET  scooter_status= 1 , user_id= 0 ,done_at= NULL  , take_at= NULL WHERE id= $id ";
$req = $bdd->prepare($qq);
$req->execute();
 */

$id = $_POST['id'];
updateStatus($id);
