<?php
            include('includes/head.php');
            include('includes/header.php');
            include('includes/db.php');
            include('includes/function.php');

                if(count($_POST)>0)  {
                    $id = $_GET['id'];
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $address = $_POST['address'];
                    $number = $_POST['number'];
                    $ville = $_POST['ville'];
                    $code_postal = $_POST['code_postal'];

                    updateUser2($id,$firstname,$lastname,$address,$number,$code_postal,$ville);

                }
               




 ?>
 <!DOCTYPE html>

<main class="mt-5 pt-3">
     <div class="container-fluid">
         <!--add div here-->
        <div class="row">
          <div class="col-md-12">
            <h4>Dashboard</h4>

          
          </div>
        </div>
       <br> <br>

        <form method="post" enctype="multipart/form-data" class="row g-3">
                 <?php include('includes/message.php');
                  /* $email = $_SESSION['email'];
                  $result = $bdd->query( "SELECT * FROM users WHERE email = '$email' " ) ;
                  $response = $result->fetch();
                  $id = $response['id']; */
                  $id = user_id();
                  $response = getUserById($id);
                  ?>
  
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">firstname</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $response['firstname'] ;?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">lastname</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $response['lastname'] ;?>"required>
                    </div>        
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Address </label>
                        <input type="text" class="form-control" id="inputAddress"name="address" value="<?= $response['address'] ;?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Number</label>
                        <input type="text" class="form-control"  name="number" id="inputCity" value="<?= $response['number'] ;?>" required>
                    </div>

                   
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">City</label>
                        <input type="text" name="ville" class="form-control" id="inputZip" value="<?= $response['ville'] ;?>" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="inputZip" name="code_postal"   value="<?= $response['code_postal'] ;?>" required>
                    </div>
                   
                    <div class="col-12">
                                <input type="submit" class="btn btn-secondary" name="submit" value="submit" class="btn btn">
                                <a href="profile.php" class="btn btn-primary">Profile</a>
                    </div>
        </form>

    </div>
    </main>
    