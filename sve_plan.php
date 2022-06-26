<?php 
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');


//changer le status de l'id récupéré en paramètre de la page en 3
$id = $_POST['id'];
$q = " UPDATE  scooter SET  scooter_status=3 , take_at =CURRENT_TIMESTAMP WHERE id= $id ";
$req = $bdd->prepare($q);
$req->execute();    



