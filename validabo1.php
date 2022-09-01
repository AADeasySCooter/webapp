<?php 
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');
include('includes/function.php');

?><br><br><br><br><br><br><br>
<?php

$user_id = user_id();
$q = "UPDATE  users SET  trip_month=1 , cours =5  WHERE id= $user_id ";
$req = $bdd->prepare($q);
$req->execute();   




?>

