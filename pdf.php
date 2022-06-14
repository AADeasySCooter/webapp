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



    $getProduct = $bdd->query("SELECT * FROM users where email ='".$_SESSION['email']."'"); 
    while($product = $getProduct->fetch()){ ?>
                            
       
                
            
        <?php
        $pdf->Cell(0,5,$product['lastname'],0,1);
        $pdf->Cell(0,5,$product['firstname'],0,1);
        $pdf->Cell(0,5,$product['number'],0,1);
        $pdf->Cell(0,5,utf8_decode($product['address']),0,1);
        $pdf->Cell(0,5,$product['code_postal'],0,1);
        $pdf->Cell(0,5,$product['ville'],0,1);
        }
$pdf->Output();


  

                    
                            
                           