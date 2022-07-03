<?php 
  include('includes/db.php');
  include('includes/head.php');
  include('includes/header.php');
 

    

if(isset($_POST['addPlan']))
{
    $Plan_title = $_POST['plan_title'];
    $Plan_description = $_POST['plan_description'];
    $Plan_price = $_POST['plan_price'];
 


        if(empty($Plan_title) || empty($Plan_description) || empty($Plan_price) )  {

            $message[] = 'tous les champs doivent etre remplis';
        }else{
            $insertProduct = $bdd->prepare('INSERT INTO plan(plan_title, plan_description,  plan_price ) VALUES(? ,? ,?)');
            $insertProduct->execute(array($Plan_title, $Plan_description,$Plan_price ));
            $message[] = 'Plan ajouter ';

        }

}

?>
<!DOCTYPE html>
       
   

  <main>
  <div class="container">

      <div class="div-center">

         <section id="course" class="course">
         <?php 
    if(isset($message)){
        foreach($message as $message ){
            echo'<span class="message">'.$message.'</span>';
        }
    }
    ?>

        <div class="row">
			 <div class="course-col">
                 <br> <br> <br> 

                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"> <!-- ?php $_SERVER['PHP_SELF' -->
                    <h3>Add new Plan</h3>
                        <div class="mb-3">
                            <input type="text"  class="form-control"placeholder="title" name="plan_title">
                        </div>
                        <div class="mb-3">
                            <input type="text"  class="form-control" placeholder="description" name="plan_description" style="height:200px;font-size:14pt;">
                        </div>
                        <div class="mb-3">
                        <input type="number"  class="form-control"step="any"  placeholder="entrer le prix du plan" name="plan_price" >
                        </div>
                    

                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" name="addPlan" value="ajouter le plan">
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
