<?php 
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');

if (isset($_POST['reset-password'])){

    $select = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url ="http://localhost:8888/Workflow2/webApp_style/create-new-password.php?select=" . $select . "&validate=" . bin2hex($token) ;

    $expire = date("U") + 1800;

    $userEmail = $_POST['email'];
    $q = ""
}else{
    header('location: index.php');
}


?>
