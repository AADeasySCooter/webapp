<?php 
session_start();
require('includes/db.php');
require('fpdf184/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('./images/Logo_EASYSCOOTER-removebg-preview.png',10,1,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Title',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);



    $getUsers = $bdd->query("SELECT * FROM users where email ='".$_SESSION['email']."'"); 
    while($Users = $getUsers->fetch()){ ?>
                            
       
                
            
        <?php
        $pdf->Cell(0,5,$Users['lastname'],0,1);
        $pdf->Cell(0,5,$Users['firstname'],0,1);
        $pdf->Cell(0,5,$Users['number'],0,1);
        $pdf->Cell(0,5,utf8_decode($Users['address']),0,1);
        $pdf->Cell(0,5,$Users['code_postal'],0,1);
        $pdf->Cell(0,5,$Users['ville'],0,1);
        //recuperer toute les info de cart quand son id est egale a l'id du pdf 

        if(count($_POST)>0)  {      
                      //recuperer l'id envoyer en post dans le champ hidden

            $getId = $bdd->query("SELECT * FROM cart where id ='".$_POST['id']."'");
            while($id = $getId->fetch()){ 

                
                ?>
                                    
           
                    
                
            <?php
            $pdf->Cell(1,5,$id['product_description'],0,1);
            //recuperer le huit charactere de la description de la carte et le chercher dans la table product
            $getProduct = $bdd->query("SELECT * FROM product where product_code ='".substr($id['product_description'],2,6)."'");
            
            //recuperer le prix du produit et l'afficher dans le pdf
            while($product = $getProduct->fetch()){ 
                $pdf->Cell(1,5,$product['product_name']  ,0,1);
                $pdf->Cell(1,5,$product['product_price']  ,0,1);




        
            }
        }
    }
           
        
        


          


        
    }
    
    



    

$pdf->Output();


  

                    
                            
                           