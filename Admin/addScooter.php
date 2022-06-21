<?php 
 include('includes/db.php');
 include('includes/head.php');
 include('includes/header.php');

if(isset($_POST['addScooter']))
{
    $scooter_name = $_POST['scooter_name'];
    $scooter_code = $_POST['scooter_code'];
    $scooter_image = $_FILES['scooter_image']['name'];
    $scooter_image_tmp_name = $_FILES['scooter_image']['tmp_name'];
    $scooter_image_folder = 'image/'.$scooter_image;


        if(empty($scooter_name)  || empty($scooter_code)  || empty($scooter_image))  {

            $message[] = 'tous les champs doivent etre remplis';
        }else{
            $insertscooter = $bdd->prepare('INSERT INTO scooter(scooter_name,  scooter_code , scooter_image) VALUES(? ,? ,?)');
            $insertscooter->execute(array($scooter_name,  $scooter_code, $scooter_image));
            $message[] = 'article ajouter ';

        }

}

?>
<!DOCTYPE html>
         

    <?php 
    if(isset($message)){
        foreach($message as $message ){
            echo'<span class="message">'.$message.'</span>';
        }
    }
    ?>
    <main class="mt-5 pt-3">
     <div class="container-fluid">
         <!--add div here-->
        <div class="row">
          <div class="col-md-12">
            <h4>Dashboard</h4>
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