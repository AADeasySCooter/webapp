<?php 
  include('includes/db.php');
  include('includes/head.php');
  include('includes/header.php');
 

if(isset($_POST['addNotification']))
{
    $Notification_title = $_POST['title'];
    $Notification_description = $_POST['description'];



        if(empty($Notification_title) || empty($Notification_description) )  {

            $message[] = 'tous les champs doivent etre remplis';
        }else{
            $insertProduct = $bdd->prepare('INSERT INTO notification(title, description) VALUES(? , ?)');
            $insertProduct->execute(array($Notification_title, $Notification_description));
            $message[] = 'Notification ajouter ';

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

  <main>
  <div class="container">

      <div class="div-center">

         <section id="course" class="course">
  

        <div class="row">
			 <div class="course-col">
                 <br> <br> <br> 

                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"> <!-- ?php $_SERVER['PHP_SELF' -->
                    <h3>Add new Notification</h3>
                        <div class="mb-3">
                            <input type="text"  class="form-control"placeholder="title" name="title">
                        </div>
                        <div class="mb-3">
                            <input type="text"  class="form-control" placeholder="description" name="description" style="height:200px;font-size:14pt;">
                        </div>
                        
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" name="addNotification" value="ajouter une Notification">
                        </div>
                    </form>

                    
             </div>
        </div>

     </section>
    </div>
</div>

</main>
</body>
</html>
