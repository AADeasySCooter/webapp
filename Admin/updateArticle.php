
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
                   $title = $_POST['title'];
                    $description = $_POST['description'];
                    $autor = $_POST['autor'];
                    $image = $_POST['image'];

                    updateArticle($id,$title,$description,$autor,$image);
                    $message[] = 'article update ';

                }
                $id = $_GET['id'];
                $response = getArticleById($id);
              




 ?>
          </div>
        </div>
        <div class="row">
                <div class="course-col">
                
                        
                                <form name="frmUser" method="post" action=""> 
                                <div class="mb-3">
                                <input  class="form-control" type="text" name="title" value="<?= $response['title'] ;?>">
                                </div>
                                <div class="mb-3">
                                <input type="text" class="form-control" name="description" value="<?= $response['description'] ;?>">
                                </div>
                                <div class="mb-3">
                                <input type="text" class="form-control"name="autor" value="<?= $response['autor'] ;?>">
                                </div>
                                <div class="mb-3">
                                <input type="file"class="form-control" name="image" value="<?= $response['image'] ;?>">        
                                </div>
                                <div class="mb-3">
                                <input type="submit" class="btn btn-primary"  name="submit" value="submit" class="btn btn">
                                <a href="editArticle.php" class="btn btn-secondary">Article</a>
                                </div>

                                </form>
                          
                   
     
        </div>

    </div>
    </main>
    