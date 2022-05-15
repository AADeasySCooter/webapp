
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
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $autor = $_POST['autor'];
                    $image = $_POST['image'];
          
                    $radmin = $bdd->query( "UPDATE articles set title = '$title' , description = '$description'
                    , autor = '$autor',
                     image = '$image'
                    WHERE id = '$idd'  " );
                    $message[] = 'article update ';

                }
                $id = $_GET['id'];
                $result = $bdd->query( "SELECT * FROM articles WHERE id = $id " ) ;
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
                                <input type="text" name="title" value="<?= $response['title'] ;?>">
                                <br>
                                <input type="text" name="description" value="<?= $response['description'] ;?>">
                                <br>
                                <input type="text" name="autor" value="<?= $response['autor'] ;?>">
                                <br>
                                <input type="file" name="image" value="<?= $response['image'] ;?>">        
                                <br>
                                <input type="submit" class="btn btn-secondary" name="submit" value="submit" class="btn btn">
                                <a href="editArticle.php" class="btn btn-primary">Article</a>

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
    