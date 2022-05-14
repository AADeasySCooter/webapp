<?php 
 include('includes/db.php');
 include('includes/head.php');
 include('includes/header.php');

  if(isset($_POST['email'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $id = $_POST['id'];

        if(empty($product_name) || empty($product_price) || empty($product_description) || empty($id))  {

            $message[] = 'tous les champs doivent etre remplis';
        }else{
            $insertProduct = $bdd->prepare("UPDATE users SET  product_name ='$product_name ', product_price = '$product_price', product_description = '$product_description' WHERE  id ='$id' ");
            $insertProduct->execute(array($product_name, $product_price,$product_description,$id));
            $message[] = 'article modifier  ';

        }


  }

 ?>
 <!DOCTYPE html>

 <main class="mt-5 pt-3">
     <div class="container-fluid">
         <!--add div here-->
        
        <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Products
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table
                            id="example"
                            class="table table-striped data-table"
                            style="width: 100%"
                        >
                            <thead>
                            <tr>
                                
                                <th>Name</th>
                                <th>price</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Actions</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php   $getProduct = $bdd->query("SELECT * FROM product ORDER BY created_at "); 
                            
                            while($product = $getProduct->fetch()){ ?>
                            <tr id = "<?php echo $product['id']; ?>">
                            

                                
                                <td data-target="product_name"><?= $product['product_name'] ;?></td>
                                <td data-target="product_price"><?= $product['product_price'] ;?></td>
                                <td data-target="product_description"><?= $product['product_description'] ;?></td>
                                <td data-target="created_at">><?= $product['created_at'] ;?></td>
                                <td><a href="#" data-role="edit" data-id="<?php echo $product['id'] ;?>">Edit</a></td>
                               
                            
                            </tr>
                            <?php
                                
                            } ?>
                            </tbody>
                            
                        </table>
                            
                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                        Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <div class="form-group">
                                                    <label>product_name</label>
                                                    <input type="text" id="product_name" class="form-control"></input>
                                                </div>
                                                <div class="form-group">
                                                    <label>product_description</label>
                                                    <input type="text" id="product_description" class="form-control"></input>
                                                </div>
                                                <div class="form-group">
                                                    <label>product_price</label>
                                                    <input type="number" id="product_price" class="form-control"></input>
                                                </div>
                                                <div class="form-group">
                                                    <label>product_image</label>
                                                    <input type="file" id="product_image" class="form-control"></input>
                                                </div>
                                                <input type="hidden" id="userId" class="form-control"></input>

                                                
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" id="save" class="btn btn-primary pull-right" >Edit</a>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    
                        </div>
                    </div>
                    </div>
                </div>
                
        </div>
       
    </div>
    <script>
        $(document).ready(function(){
            $(document).on('click','a[data-role=edit]',function(){
                    var id = $(this).data('id');
                    var product_name = $('#'+id).children('td[data-target=product_name]').text();
                    var product_price= $('#'+id).children('td[data-target=product_price]').text();
                    var product_description= $('#'+id).children('td[data-target=product_description]').text();
                    $('#product_name').val(product_name);
                    $('#product_price').val(product_price);
                    $('#product_description').val(product_description);
                    $('#userId').val(id);
                    $('#exampleModalCenter').modal('toggle');
                   


                    $('#save').val(function(){
                        var id = $('#userId').val();
                        var product_name = $('#product_name').val(product_name);
                        var product_price = $('#product_price').val(product_price);
                        var product_description = $('#product_description').val(product_description);
                        
                            $.ajax({
                                url : 'editProduct.php' ,
                                method : 'post',

                                data : { product_name : product_name , product_price: product_price, product_description: product_description , id : id },

                                success : function(response){
                                    $('#'+id).children('td[data-target=product_name]').text(product_name);
                                    $('#'+id).children('td[data-target=product_price]').text(product_price);
                                    $('#'+id).children('td[data-target=product_description]').text(product_description);
                                    $('#exampleModalCenter').modal('toggle');

                                }

                            });

                    });
 
                   
            })
        });
        
    </script>
    </main>