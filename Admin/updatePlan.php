
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
                   $id = $_GET['id'];
                    $plan_title = $_POST['plan_title'];
                    $plan_description = $_POST['plan_description'];
                    $plan_price = $_POST['plan_price'];

                    updatePlan($id,$plan_title,$plan_description,$plan_price);

                    $message[] = 'plan update ';

                }
                $id = $_GET['id'];
                $response = getPlanById($id);
              




 ?>
          </div>
        </div>
        <div class="row">
                <div class="course-col">
                
                        
                                <form name="frmUser" method="post" action=""> 
                                <div class="mb-3">
                                <input  class="form-control" type="text" name="plan_title" value="<?= $response['plan_title'] ;?>">
                                </div>
                                <div class="mb-3">
                                <input type="text" class="form-control" name="plan_description" value="<?= $response['plan_description'] ;?>">
                                </div>
                                <div class="mb-3">
                                <input type="number" class="form-control" step="any" name="plan_price" value="<?= $response['plan_price'] ;?>">
                                </div>
                             
                                <div class="mb-3">
                                <input type="submit" class="btn btn-primary"  name="submit" value="submit" class="btn btn">
                                <a href="editPlan.php" class="btn btn-secondary"> Plan</a>
                                </div>

                                </form>
                          
                   
     
        </div>

    </div>
    </main>
    