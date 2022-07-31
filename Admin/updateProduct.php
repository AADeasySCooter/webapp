
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
            include('includes/message.php');

            $old_Info = getProductById($_GET['id']);

                if(count($_POST)>0)  {

                  if( ($_POST['product_image']) == '' ){

                      $id = $_GET['id'];
                      $product_name = $_POST['product_name'];
                      $product_description = $_POST['product_description'];
                      $product_price = $_POST['product_price'];
                      $product_code = $_POST['product_code'];
                      $product_image = $old_Info['product_image'];
                      
                      updateProduct($id,$product_name,$product_description,$product_price,$product_image,$product_code);
                    
                      $message[] = 'product update ';

                    }
                    else{
                      $id = $_GET['id'];
                      $product_name = $_POST['product_name'];
                      $product_description = $_POST['product_description'];
                      $product_price = $_POST['product_price'];
                      $product_code = $_POST['product_code'];
                      $product_image = $_POST['product_image'];
                      
                      updateProduct($id,$product_name,$product_description,$product_price,$product_image,$product_code);
                    
                      $message[] = 'product update ';

                }
              }
                $id = $_GET['id'];
                $response = getProductById($id);
                


 ?>
          </div>
        </div>
          <div class="row">
                <div class="course-col">

                                <form name="frmUser" method="post" action=""> 
    
                                <div class="mb-3">
                                <input type="text" class="form-control" name="product_name" value="<?= $response['product_name'] ;?>">
                                </div>
                                <div class="mb-3">
                                <input type="text" class="form-control" name="product_description" value="<?= $response['product_description'] ;?>">
                                </div>
                                <div class="mb-3">
                                <input type="number" class="form-control" step="any" name="product_price" value="<?= $response['product_price'] ;?>">
                                </div>
                                <div class="mb-3">
                                <input type="text" class="form-control" name="product_code" value="<?= $response['product_code'] ;?>">
                                </div>
                                <div class="mb-3">
                                <input type="file" class="form-control" name="product_image" value="<?= $response['product_image'] ;?>">        
                                </div>
                                <input type="submit" class="btn btn-secondary" name="submit" value="submit" class="btn btn">
                                <a href="editProduct.php" class="btn btn-primary">Article</a>

                                </form>
                          
                       
                </div>
                
        </div>

   
    </div>
    </main>
    