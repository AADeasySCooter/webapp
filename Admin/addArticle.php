<?php 
  include('includes/db.php');
  include('includes/head.php');
  include('includes/header.php');
 

if(isset($_POST['addArticle']))
{
    $Article_title = $_POST['title'];
    $Article_description = $_POST['description'];
    $Article_autor = $_POST['autor'];
    $Article_image = $_FILES['image']['name'];
    $Article_image_tmp_name = $_FILES['image']['tmp_name'];
    $Article_image_folder = 'images/'.$Article_image;


        if(empty($Article_title) || empty($Article_description) || empty($Article_autor) || empty($Article_image))  {

            $message[] = 'tous les champs doivent etre remplis';
        }else{
            $insertProduct = $bdd->prepare('INSERT INTO articles(title, description,  autor, image) VALUES(? ,? ,?, ?)');
            $insertProduct->execute(array($Article_title, $Article_description,$Article_autor,$Article_image));
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
        <div class="row">
			 <div class="course-col">

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"> <!-- ?php $_SERVER['PHP_SELF' -->
            <h3>Add new product</h3>
            <div class="mb-3">
            <input type="text" placeholder="title" name="title">
            </div>
            <div class="mb-3">
            <input type="text" placeholder="description" name="description" style="height:200px;font-size:14pt;">
            </div>
            <div class="mb-3">
            <input type="text" placeholder="autor" name="autor">
            </div>
           
            <div class="mb-3">
            <input type="file" placeholder="entrer l'image du produit" name="image">
            </div>
            <div class="mb-3">
           <input type="submit"  name="addArticle" value="ajouter un produit">
            </div>
            </form>
        </div>
</main>
</body>
</html>