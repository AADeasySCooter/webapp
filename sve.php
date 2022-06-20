<?php 
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');



    if (isset($_SESSION['email'])){
        $recupProfil =$bdd->prepare("SELECT * FROM users WHERE email= '".$_SESSION['email']."'");     
        $recupProfil->execute();
        $voirProfil =$recupProfil->fetch();
        $user_id = $voirProfil['id'];
        $product = $_SESSION['product'];
        


            if(isset($_SESSION["products"]) && count($_SESSION["products"])>0 && isset($_SESSION["email"]) ) {
                foreach($_SESSION["products"] as $key => $value) {
                    $product[$key]=$value;
        
                    $succes = $bdd->exec( "INSERT INTO cart (user_id, product_description)   VALUES ($user_id, '".implode(',',$value)."')   ;" );
        
                }
                
               
            if($succes){
                http_response_code(201);
            }else{
                http_response_code(500);
            }

            //inserer la liste de valeur dans $product dans la base de données

        }//else here


        }    //inserer 
                








    





?>

 