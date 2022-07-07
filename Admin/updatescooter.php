
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
                    $scooter_name = $_POST['scooter_name'];
                    $scooter_status = $_POST['scooter_status'];
                    $scooter_code = $_POST['scooter_code'];
                    $scooter_image = $_POST['scooter_image'];
                    $scooter_lat = $_POST['scooter_lat'];
                    $scooter_long = $_POST['scooter_long'];
                    
          
                    $radmin = $bdd->query( "UPDATE scooter set scooter_name = '$scooter_name' , scooter_status = '$scooter_status'
                    , lat = '$scooter_lat',
                    lon = '$scooter_long',
                    scooter_code = '$scooter_code',
                    scooter_image = '$scooter_image'
                    WHERE id = '$idd'  " );
                    $message[] = 'scooter update ';

                }
                $id = $_GET['id'];
                $result = $bdd->query( "SELECT * FROM scooter WHERE id = $id " ) ;
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
                                <input type="text" name="scooter_name" value="<?= $response['scooter_name'] ;?>">
                                <br>
                                <input type="text" name="scooter_status" value="<?= $response['scooter_status'] ;?>">
                                
                                <br>
                                <input type="text" name="scooter_code" value="<?= $response['scooter_code'] ;?>">
                                <br>
                                <input type="number" step="any" name="scooter_lat" value="<?= $response['lat'] ;?>">
                                <br>
                                <input type="number" step="any" name="scooter_long" value="<?= $response['lon'] ;?>">
                                <br>
                                <input type="file" name="scooter_image" value="<?= $response['scooter_image'] ;?>">        
                                <br>
                                <input type="submit" class="btn btn-secondary" name="submit" value="submit" class="btn btn">
                                <a href="editscooter.php" class="btn btn-primary">Scooter</a>

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
    





