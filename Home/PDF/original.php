<?php
// require('fpdf.php');
require('pdf_html.php');






class PDF extends FPDF
{
// Page header
function Header()
{   

include "../connector/connect.php";

    $sql = "SELECT *from tbl_service_type JOIN tbl_client_info ON tbl_info_fk = client_info_id WHERE tbl_service_id = 1";

    $result = mysqli_query($conn,$sql);
    $num = rand(100,900);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $ref = $row['reference_id'];

            $this->SetFont('Arial','',10);
            $this->SetLineWidth(1.1);
            // Logo
            // $this->SetMargins(10,10,10);
             $this->Rect(0, 0, 210, 286);
            $this->Image('dilg.png',20,8,25);
            $this->Image('logo.png',160,8,25);
            // $this->SetMargins(10,10,50);
            // Arial bold 15
            $this->SetFont('Arial','',10);
            // Move to the right
            $this->Cell(80);
            // Title
            $this->SetFillColor(123,230,255);
            $this->Cell(30,10,'Republic of the Philippines',0,0,'C');
            $this->SetFont('Arial','B',10);
            $this->Ln(8);
            // text-align = L R C
            //$this->Cell(x,y,'text',border,new_line,'text-align')
            $this->Cell(190,4,'Department of the Interior and Local Government',0,10,'C');
            $this->SetTextColor(58,76,141);
            $this->SetFont('Arial','B',12);
            $this->Cell(190,7,'BUREAU OF FIRE PROTECTION',0,10,'C');
            $this->Ln(15);
            $this->SetFont('Arial','B',16);
            $this->SetTextColor(255,0,0);
            $this->Cell(71,4,'FSEC NO. R:'.$num.' ',0,0,'R');
            // Line break.
             $this->Ln(10);
            // $this->SetFont('Arial','U',16);
            $this->SetFont('Arial','B',20,'U');
            $this->SetTextColor(23,54,93);
            $this->Ln(5);
            $this->Cell(190,4,'FIRE SAFETY EVALUATION CLEARANCE',0,0,'C');
            $this->SetFont('Arial','B',13);
            // $this->Ln(6);
            //    $this->Cell(190,8,"(FOR BUSINESS PERMIT)",0,0,'C');
            // Line break
            $this->Ln(10);
            $this->SetFont('Arial','',13);
            $this->SetTextColor(22,22,22);
            $this->Cell(170,4,'November 18, 2022',0,1,'R');
            $this->SetFont('Arial','',15);
            $this->SetTextColor(0,0,0);
            $this->Cell(158,12,'Date:',0,0,'R');
            // Line break
            $this->Ln(9);

            $this->SetFont('Arial','B',10);
            $this->SetTextColor(0,0,0);

            $this->Cell(84,4,'TO WHOM IT MAY CONCERN:',0,1,'C');

            // text
            $this->SetFont('Arial','',9);
            $this->SetTextColor(0,0,0);
            // $this->SetRightMargin(50);
            // $this->SetLeftMargin(10);
            $this->Cell(190,8,'By virtue of the provisions of RA 9514 otherwise known as the Fire Code of the Philippines of 2008 the application for',0,0,'R');
              $this->Ln(5);
            $this->Cell(173,8,"FIRE SAFETY EVALUATION CLEARANCE of ".$row['business_name']."",0,0,'C');
               $this->Ln(4);
                $this->SetFont('Arial','I',9);
            $this->Cell(143,8,"(Name of Building/Structure/Faculty)",0,0,'R');
            $this->Ln(6);
            $this->Cell(190,8,"________________________________________________________________________________________.",0,0,'C');
             $this->Ln(4);
            $this->Cell(190,8,"to be    constructed /    renovated /    altered /    modified /    change of occupancy located at",0,1,'C');
            $this->Ln(1);
            $this->Cell(190,8,"________________________________________________________________________________________.",0,0,'C');
               $this->Ln(4);
               $this->Cell(190,8,"(Address)",0,0,'C');
                $this->Ln(7);
               $this->Cell(190,8,"Owned By:__________________________________________ is hereby GRANTED after the building plans and",0,0,'C');
                $this->Ln(4);

               $this->Cell(140,8,"(Name of Owner/Representative)
        ",0,0,'C');
                $this->Ln(6);
                $this->SetFont('Arial','',9);
                $this->Cell(190,8,"Other documents conform to the fire safety and life safety requirements of the Fire Code of the Philippines of 2008
        ",0,0,'C');
                $this->Ln(5);
                $this->SetFont('Arial','',9);
                $this->Cell(161,8,"and its IRR and that the recommendations in the Fire Safety Checklist (FSC) will be adopted.
        ",0,0,'C');
                $this->Ln(6);
                $this->SetFont('Arial','',9);
                $this->Cell(190,8,"This clearance is being issued for ___________________________________________________.
        ",0,0,'C');
                $this->Ln(5);
                 $this->Cell(190,8,"________________________________________________________________________________________.",0,0,'C');
                    $this->Ln(5);
                $this->SetFont('Arial','',9);
                $this->Cell(189,8,"Violation of Fire Code provisions shall ipso facto cause this certificate null and void, and shall hold
        ",0,0,'C');
                  $this->Ln(6);
                $this->SetFont('Arial','',9);
                $this->Cell(175,8,"hold the owner of the 
        building liable to the penalties provided for by the said Fire code.
        ",0,1,'C');
                $this->Ln(7);
                $this->SetFont('Arial','B',9);
                $this->Cell(54,8,"Fire Code Fees:
        ",0,0,'C');
                $this->Ln(7);
                $this->SetFont('Arial','',9);
                $this->Cell(49,8,"Amount Paid:
        ",0,0,'C');
                $this->Ln(7);
                $this->SetFont('Arial','',9);
                $this->Cell(49,8,"O.R. Number:
        ",0,0,'C');
                $this->Ln(7);
                $this->SetFont('Arial','',9);
                $this->Cell(37,8,"Date:
        ",0,0,'C');
                 // $this->Ln();
                $this->SetFont('Arial','B',9);
                $this->Cell(140,0,"RECOMMEND APPROVAL
        ",0,0,'R');
                $this->Ln(5);
                 $this->SetFont('Arial','B',9);
                $this->Cell(178,0,"_______________________
        ",0,0,'R');
                $this->Ln(4);
                 $this->SetFont('Arial','',9);
                $this->Cell(169,0,"CHIEF, FSES
        ",0,1,'R');
                $this->Ln(4);
                  $this->SetFont('Arial','B',9);
                   $this->Ln(4);
                $this->Cell(168,0,"APPROVED:
        ",0,0,'R');
                $this->Ln(5);
                 $this->SetFont('Arial','B',9);
                $this->Cell(178,0,"_______________________
        ",0,0,'R');
                $this->Ln(6);
                 $this->SetFont('Arial','',9);
                $this->Cell(185,0,"CITY/MUNICIPAL FIRE MARSHAL
        ",0,1,'R');
                 $this->Ln(8);
                 $this->SetFont('Arial','B',8);
                $this->Cell(186,0,"NOTE: This Clearance is accompanied by Fire safety Checklist and does not take the place of any license required by
        ",0,1,'C');
                  $this->Ln(5);
                 $this->SetFont('Arial','B',8);
                $this->Cell(188,0,"law and is not transferable. Any change or alteration in the design and specification during construction shall require a
        ",0,1,'C'); 
                $this->Ln(5);
                 $this->SetFont('Arial','B',8);
                $this->Cell(188,0,"new clearance.
        ",0,1,'C');
                   $this->Ln(5);
                   $this->SetTextColor(255,0,0);
                 $this->SetFont('Arial','B',8);
                $this->Cell(188,0,"PAALALA: MAHIGPIT NA IPINAGBABAWAL NG PAMUNUAN NG BUREAU OF FIRE PROTECTION SA MGA KAWANI NITO ANG
        ",0,1,'C'); 
                  $this->Ln(4);
                   $this->SetTextColor(255,0,0);
                 $this->SetFont('Arial','B',8);
                $this->Cell(188,0,"MAGBENTA O MAGREKOMENDA NG ANUMANG BRAND NG FIRE EXTINGUISHER.
        ",0,1,'C'); 
                 $this->Ln(7);
                   // $this->SetTextColor(255,0,0);
                 $this->SetTextColor(15,36,62);
                 $this->SetFont('Arial','B',13);
                $this->Cell(188,0,"FIRE SAFETY IS OUR MAIN CONCERN.
        ",0,0,'C'); 
        $this->Ln(1);
                $this->SetTextColor(0,0,0);
                $this->SetFont('Arial','B',5);
                $this->Cell(54,8,"DISTRIBUTION:
        ",0,0,'C');
                $this->Ln(4);
                $this->SetTextColor(0,0,0);
                $this->SetFont('Arial','B',6);
                $this->Cell(86,8,"Light Blue-Green (Applicant/Owners copy)
        :
        ",0,0,'C');
                $this->Ln(4);
                $this->SetTextColor(0,0,0);
                $this->SetFont('Arial','B',6);
                $this->Cell(59,8,"Pink (OBO copy):
        ",0,0,'C');
                $this->Ln(4);
                $this->SetTextColor(0,0,0);
                $this->SetFont('Arial','B',6);
                $this->Cell(59,8,"Blue (BFP copy)
        :
        ",0,0,'C');

           }
    }
    // $this->Ln(1);
    // $this->SetFont('Arial','B',9);
    // $this->SetTextColor(0,0,0);
    // $this->Cell(98,8,'of',0,1,'C');

}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',8);
    // Page number
    $this->Cell(0,18,'ORIGINAL',0,0,'R');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();


$pdf->AddPage();
$pdf->SetFillColor(255,230,255);
$pdf->Rect(0, 0, 210, 297, 'T');
$pdf->SetMargins(5,5,5);
$pdf->SetFont('Times','',12);

$pdf->Output();
?>