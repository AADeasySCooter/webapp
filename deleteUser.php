<!DOCTYPE html>

<main class="mt-5 pt-3">
     <div class="container-fluid">
         <!--add div here-->
        <div class="row">
          <div class="col-md-12">
            <h4>Dashboard</h4>

            <?php
       
            include('includes/db.php');
            include('includes/function.php');

            $id = $_GET['id'];
            deleteUser($id);




           /*  if(isset($_GET['id']) && !empty($_GET['id'])){

                $q = 'DELETE FROM users WHERE id = :id;';
                $stmt = $bdd->prepare($q);
                $statuss = $stmt->execute(
                    array(
                        'id'=>$_GET['id']
                    ));
                if($statuss){
                    session_destroy();
                    echo'User deleted ';
                    header('location:deconnexion.php?message=account deleted.&type=danger');
                    
                }
            }else{
                echo'User not deleted error id ';
            
            } */




 ?>
          </div>
        </div>
        

   
    </div>
    </main>
    
