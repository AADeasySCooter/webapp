<?php 
 include('includes/db.php');
 include('includes/head.php');
 include('includes/header.php');

if(isset($_POST['addProduct']))
{
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_code = $_POST['product_code'];
    $product_description = $_POST['product_description'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'image/'.$product_image;


        if(empty($product_name) || empty($product_price) || empty($product_description)|| empty($product_code)  || empty($product_image))  {

            $message[] = 'tous les champs doivent etre remplis';
        }else{
            $insertProduct = $bdd->prepare('INSERT INTO product(product_name,  product_price, product_description, product_image, product_code) VALUES(? ,? ,?, ?, ?)');
            $insertProduct->execute(array($product_name, $product_price,$product_description,$product_image, $product_code));
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
            <h3>Add new product</h3>
            <div class="mb-3">
            <input type="text" placeholder="entrer le nom du produit" name="product_name">
            </div>
            <div class="mb-3">
            <input type="number" step="any"  placeholder="entrer la prix du produit" name="product_price" >
            </div>
            <div class="mb-3">
            <input type="text" placeholder="entrer le code du produit" name="product_code" >
            </div>
            <div class="mb-3">
         <textarea name="product_description" placeholder="Entrer la description du produit"  rows="5" cols="33" ></textarea>
            </div>
            <div class="mb-3">
            <input type="file" placeholder="entrer l'image du produit" name="product_image">
            </div>
            <div class="mb-3">
           <input type="submit"  name="addProduct" value="ajouter un produit">
            </div>
            </form>
        </div>
     </div>
    </main>
    
    
   

   


     
    
    
  
</body>
</html>