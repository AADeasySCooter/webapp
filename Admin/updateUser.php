
<!DOCTYPE html>

<main class="mt-5 pt-3">
     <div class="container-fluid">
         <!--add div here-->
        <div class="row">
          <div class="col-md-12">
            <h4>Dashboard</h4>

            <?php
            include('includes/head.php');
            include('includes/header.php');
            include('includes/db.php');

                if(count($_POST)>0)  {
                    $idd = $_GET['id'];
                    $email = $_POST['email'];
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $role_id = $_POST['role_id'];
                    $status = $_POST['status'];
                    $radmin = $bdd->query( "UPDATE users set email = '$email' , firstname = '$firstname'
                    , lastname = '$lastname',
                     role_id = '$role_id' ,  status = '$status'
                    WHERE id = '$idd'  " );
                    $message[] = 'data update ';

                }
                $id = $_GET['id'];
                $result = $bdd->query( "SELECT * FROM users WHERE id = $id " ) ;
                $response = $result->fetch();




 ?>
          </div>
        </div>
        <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> users
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                                <form name="frmUser" method="post" action=""> 
                                <input type="text" name="email" value="<?= $response['email'] ;?>">
                                <br>
                                <input type="text" name="firstname" value="<?= $response['firstname'] ;?>">
                                <br>
                                <input type="text" name="lastname" value="<?= $response['lastname'] ;?>">
                                <br>
                                <input type="text" name="username" value="<?= $response['username'] ;?>">
                                <br>
                                <input type="number" name="role_id" value="<?= $response['role_id'] ;?>">
                                
                                <br>
                                <input label="test" type="number" name="status" value="<?= $response['status'] ;?>">
                                <br>
                                <input type="submit" class="btn btn-secondary" name="submit" value="submit" class="btn btn">
                                <a href="usersAll.php" class="btn btn-primary">Users</a>

                                </form>
                          
                        </div>
                    </div>
                    </div>
                </div>
                
        </div>

      <?php var_dump($response); 
      ?>
    </div>
    </main>
    