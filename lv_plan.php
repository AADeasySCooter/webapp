<?php 
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');

//update le status de la trot à 1 enlever le user_id et done_at et take_at
$id = $_POST['id'];
$qq = " UPDATE  scooter SET  scooter_status=1 , user_id = NULL,done_at =NULL  , take_at =NULL WHERE id= $id ";