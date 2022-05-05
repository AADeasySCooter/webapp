<?php
include('includes/db.php');

if(isset($_POST['giveRole'])) {
    $role = $_POST['team'];
    if($role == 'Administrator') {
        $radmin = $bdd->exec("UPDATE  users SET role_id = ' 3 ' WHERE email = :email ");
        $message[] = 'Vous etes maintenant administrateur  ';
        
    }else if($role == 'Editor'){
        $radmin = $bdd->exec("UPDATE  users SET role_id = ' 2 ' WHERE email = 2");
        $message[] = 'Vous etes maintenant Editeur  ';

    }else{
        $insertProduct = $bdd->prepare('INSERT INTO users(role_id) VALUES(1)');
        $insertProduct->execute(array($role));
        $message[] = 'Vous etes maintenant user  ';
    }
}

?>
<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Website design</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" >
     <link rel="stylesheet" href="./style.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" >
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
     
     
 </head>

 <?php 
    if(isset($message)){
        foreach($message as $message ){
            echo'<span class="message">'.$message.'</span>';
        }
    }
    ?>



                     <div class="login-form">
                        <?php include('includes/message.php'); ?>

                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form2" enctype="multipart/form-data">
                        <input type="email" name="email" placeholder="email" class="form-control" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">

						<div class="mb-3">
                       
                            <label for="Role_team">Role:</label>
                            <input type="text" name="team" id="Role_team" list="team_list">
                            <datalist id="team_list">
                            <option name ="Administrator" >Administrator</option>
                            <option name = "Editor" >Editor</option>
                            <option name = "User" >User</option>
                           
                            </datalist>
                        </div>
                        <!--<select name="teams">
                           <option name ="Administrator" >Administrator</option>
                            <option name = "Editor" >Editor</option>
                            <option name = "User" >User</option>
                        </select> -->
						
						<input type="submit" name="giveRole" value="giveRole" class="btn btn-primary" id="form2">
						</form>
                        </div>
                        <!-- partial -->
                        <script  src="./script.js"></script>

                     