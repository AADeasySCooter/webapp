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
        

        
        //recuperer toute dans cart ou user_id = $user_id et l'id de la table cart est unique 


        $getPay = $bdd->query("SELECT * FROM cart where user_id ='".$Users['id']."'");
        while($Pay = $getPay->fetch()){ ?>
                                
       
                
            
        <?php
        $pdf->Cell(0,5,$Pay['product_description'],0,1);
        }
    }
    
$pdf->Output();


  

                    
                            
                           