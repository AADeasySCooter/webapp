<?php 
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');

    if(count($_POST)>0)  {
        $idd = $_GET['id'];
        $address = $_POST['address'];
        $number = $_POST['number'];
        $code_postal = $_POST['code_postal'];
        $ville = $_POST['ville'];
        $radmin = $bdd->query( "UPDATE users set address = '$address' , number = '$number'
        , code_postal = '$code_postal',
        ville = '$ville'
        WHERE id = '$idd'  " );
        $message[] = 'checkout1 ok ';

            ?>
            <script type="text/javascript">
            window.location = "checkout2.php";
            </script>      
             <?php



    }
    





?>
<!DOCTYPE html>

    
<!-- navbar -->

<!-- end of navbar -->



    <main>
        <div class="container">
             <div class="div-center">
                <section id="course" class="course">
                
                    
                <div class="row">
                    
                    <div class="course-col">
                    
                        
                    <?php include('includes/message.php'); ?>
                    <?php $id = $_GET['id'];
                        $result = $bdd->query( "SELECT * FROM users WHERE id = $id " ) ;
                        $response = $result->fetch(); ?>
                  

                            <h4>Delivery address</h4>

                    
                            <form method="post"   enctype="multipart/form-data" class="form1">

                            
                            <div class="mb-2">
                            <label class="form-label">Address</label>
                                <input type="text"  name="address" class="form-control" placeholder="address " value="<?= $response['address'] ;?>" required>
                            </div>
                            <label class="form-label">number</label>
                                <input type="text" name="number" class="form-control" placeholder="number " value="<?= $response['number'] ;?>" required>
                            </div>
                            <div class="mb-2">
                            <label class="form-label">Zip</label>
                                <input type="text" name="code_postal" class="form-control" placeholder="code" value="<?= $response['code_postal'] ;?>" required>
                            </div>
                            <div class="mb-2">
                            <label class="form-label">city</label>
                                <input type="text" name="ville" class="form-control" placeholder="ville" value="<?= $response['ville'] ;?>" required>
                            </div>                            
                            
                                <input type="submit" class="btn btn-primary" value="Update your Delivery address "  >
                                          
                                            
                        
                            </form>

                           

                    </div>
                

                
                
                </div>
                

                </section>
            </div>
        </div>
    </main>


</body>
</html>