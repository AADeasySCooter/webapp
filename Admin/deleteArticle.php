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
            $id = $_GET['id'];
            deleteArticle($id);

           /*  if(isset($_GET['id']) && !empty($_GET['id'])){

                $q = 'DELETE FROM articles WHERE id = :id;';
                $stmt = $bdd->prepare($q);
                $statuss = $stmt->execute(
                    array(
                        'id'=>$_GET['id']
                    ));
                if($statuss){
                    echo'Article deleted ';
                    
                }
            }else{
                echo'Article not deleted error id ';
            
            } */




 ?>
          </div>
        </div>
        <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Article
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                                <a href="editArticle.php" class="btn btn-primary">Articles</a>
                          
                        </div>
                    </div>
                    </div>
                   
                </div>
                
        </div>

   
    </div>
    </main>
    
