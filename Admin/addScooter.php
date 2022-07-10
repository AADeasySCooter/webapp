<?php 
 include('includes/db.php');
 include('includes/head.php');
 include('includes/header.php');

if(isset($_POST['addScooter']))
{
    $scooter_name = $_POST['scooter_name'];
    $scooter_code = $_POST['scooter_code'];
    $scooter_lat = $_POST['scooter_lat'];
    $scooter_long = $_POST['scooter_long'];
    $scooter_image = $_FILES['scooter_image']['name'];
    $scooter_image_tmp_name = $_FILES['scooter_image']['tmp_name'];
    $scooter_image_folder = 'image/'.$scooter_image;


        if(empty($scooter_name)  || empty($scooter_code) || empty($scooter_lat)  || empty($scooter_long)  || empty($scooter_image) )  {

            $message[] = 'tous les champs doivent etre remplis';
        }else{
            addScooter($scooter_name, $scooter_code, $scooter_lat, $scooter_long, $scooter_image);
            $message[] = 'scooter ajouter ';

        }

}

?>
<!DOCTYPE html>
         

    
    <main class="mt-5 pt-3">
     <div class="container-fluid">
         <!--add div here-->
        <div class="row">
          <div class="col-md-12">
            <h4>Dashboard</h4>
            <?php 
            if(isset($message)){
                foreach($message as $message ){
                    echo'<div class="alert alert-dark"" role="alert">
                    '.$message.'
                    </div>';
                }
            }
            ?>
          </div>
        </div>
        <div class="row">
			 <div class="course-col">

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"> <!-- ?php $_SERVER['PHP_SELF' -->
            <h3>Add new scooter</h3>
            <div class="mb-3">
            <input type="text " class="form-control" placeholder="entrer le nom du scooter" name="scooter_name">
            </div>
            <div class="mb-3">
            <input type="text" class="form-control" placeholder="entrer le code du scooter" name="scooter_code" >
            </div>
            <div class="mb-3">
            <input type="number"  class="form-control"step="any"  placeholder="latitude" name="scooter_lat" >
            </div>
            <div class="mb-3">
            <input type="number"  class="form-control"step="any"  placeholder="longitude" name="scooter_long" >
            </div>
            <div class="mb-3">
            <input type="file" class="form-control" placeholder="entrer l'image du scooter" name="scooter_image">
            </div>
            <div class="mb-3">
           <input type="submit" class="form-control"  name="addScooter" value="ajouter un scooter">
            </div>
            </form>
        </div>
     </div>
    </main>
    
    
   

   


     
    
    
  
</body>
</html>