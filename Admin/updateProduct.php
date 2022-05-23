
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
                    $product_name = $_POST['product_name'];
                    $product_description = $_POST['product_description'];
                    $product_price = $_POST['product_price'];
                    $product_code = $_POST['product_code'];
                    $product_image = $_POST['product_image'];
                    
          
                    $radmin = $bdd->query( "UPDATE product set product_name = '$product_name' , product_description = '$product_description'
                    , product_price = '$product_price',
                    product_code = '$product_code',
                    product_image = '$product_image'
                    WHERE id = '$idd'  " );
                    $message[] = 'product update ';

                }
                $id = $_GET['id'];
                $result = $bdd->query( "SELECT * FROM product WHERE id = $id " ) ;
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
                                <input type="text" name="product_name" value="<?= $response['product_name'] ;?>">
                                <br>
                                <input type="text" name="product_description" value="<?= $response['product_description'] ;?>">
                                <br>
                                <input type="number" name="product_price" value="<?= $response['product_price'] ;?>">
                                <br>
                                <input type="text" name="product_code" value="<?= $response['product_code'] ;?>">
                                <br>
                                <input type="file" name="product_image" value="<?= $response['product_image'] ;?>">        
                                <br>
                                <input type="submit" class="btn btn-secondary" name="submit" value="submit" class="btn btn">
                                <a href="editProduct.php" class="btn btn-primary">Article</a>

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
    