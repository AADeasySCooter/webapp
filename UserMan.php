<?php 
 include('includes/db.php');

if(isset($_SESSION['email'])){

    $query = "SELECT role_id FROM users WHERE email= '".$_SESSION['email']."'";     

    $result = mysqli_query($db, $query) or 

    die(mysql_error($db)); 

    if (!$result) die('Query failed: ' . mysqli_error($db)); 

    while($row = mysqli_fetch_array($result)){ 

    $q = echo $row['role_id'];

    if(isset($row['role_id']) == 3){
        echo'ok';
    }else if(isset($row['role_id']) == 2){
        echo'printf(%s, error)';
    }else{
        echo'nothing for you';
    }

 }


?>
