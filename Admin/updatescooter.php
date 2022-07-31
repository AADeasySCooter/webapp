
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
            include('includes/message.php');

            $old_Info = getScooterById($_GET['id']);

                if(count($_POST)>0)  {

                    if( ($_POST['scooter_image']) == '')
                    {
                        $id = $_GET['id'];
                        $scooter_name = $_POST['scooter_name'];
                        $scooter_status = $_POST['scooter_status'];
                        $scooter_code = $_POST['scooter_code'];
                        $scooter_image = $old_Info['scooter_image'];
                        $scooter_lat = $_POST['scooter_lat'];
                        $scooter_long = $_POST['scooter_long'];

                        updateScooter($id, $scooter_name, $scooter_status, $scooter_code, $scooter_lat, $scooter_long, $scooter_image);
                    
                        $message[] = 'scooter update ';

                    }else{

                       $id = $_GET['id'];
                        $scooter_name = $_POST['scooter_name'];
                        $scooter_status = $_POST['scooter_status'];
                        $scooter_code = $_POST['scooter_code'];
                        $scooter_image = $_POST['scooter_image'];
                        $scooter_lat = $_POST['scooter_lat'];
                        $scooter_long = $_POST['scooter_long'];

                        updateScooter($id, $scooter_name, $scooter_status, $scooter_code, $scooter_lat, $scooter_long, $scooter_image);
                    
                        $message[] = 'scooter update ';

                }
            }
                $id = $_GET['id'];
                getScooterById($id);
             


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
                                <input type="text" name="scooter_name" value="<?= getScooterById($id)['scooter_name'] ;?>">
                                <br>
                                <input type="text" name="scooter_status" value="<?= getScooterById($id)['scooter_status'] ;?>">
                                
                                <br>
                                <input type="text" name="scooter_code" value="<?= getScooterById($id)['scooter_code'] ;?>">
                                <br>
                                <input type="number" step="any" name="scooter_lat" value="<?= getScooterById($id)['lat'] ;?>">
                                <br>
                                <input type="number" step="any" name="scooter_long" value="<?= getScooterById($id)['lon'] ;?>">
                                <br>
                                <input type="file" name="scooter_image" value="<?= getScooterById($id)['scooter_image'] ;?>">        
                                <br>
                                <input type="submit" class="btn btn-secondary" name="submit" value="submit" class="btn btn">
                                <a href="editscooter.php" class="btn btn-primary">Scooter</a>

                                </form>
                          
                        </div>
                    </div>
                    </div>
                </div>
                
        </div>

 
    </div>
    </main>
    





