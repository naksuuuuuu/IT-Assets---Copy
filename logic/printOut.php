<?php

require '../fpdf/pdf_mc_table.php';
require '../config/connection.php';
if (isset($_POST['type'])) {

$plantCode = $_POST['code'];
$plantName = $_POST['plantName'];
$usage = $_POST['usage'];
$budget = $_POST['budget'];
$ioNum = $_POST['ionum'];
$reqUser = $_POST['reqUser'];
$reqDept = $_POST['reqDept'];
$reqLoc = $_POST['reqLoc'];
$reqDtl = $_POST['reqDtl'];
$dateNeeded = date('d-M-Y',strtotime($_POST['dateNeeded']));


// $pdf = new PDF_MC_Table('P', 'mm', 'A4');

$pdf -> AddPage();
$pdf -> SetFont('Arial','', 14);
$pdf -> Cell(0,5,'Document No. 20220001',0,1,'R');
$pdf -> SetFont('Arial','', 9);
$pdf -> Cell(0,5,date('d-M-Y'),0,1,'R');

$pdf -> Image('../assets/itcenter.png',10,6,0,0);
$x = $pdf->GetX();

$pdf -> Ln();
$pdf ->SetX($x);
$pdf -> SetFont('Arial','B', 13);
$pdf -> Cell(0,5,'E-IT REQUISITION FORM',0,1,'C');
$pdf -> Ln(6);
$fillColor = $pdf -> SetFillColor(142,170,219);
$pdf -> SetFont('Arial','B', 9);
$pdf -> SetTextColor(255, 255, 255);

$pdf -> SetLeftMargin(4);
$pdf -> Cell(0,0,'',0,1,'C');

$pdf -> Cell(203,5,'REQUEST INFORMATION',1,1,'C',true);

$pdf -> SetTextColor(0, 0, 0);

$pdf -> Cell(10,5,'No.',1,0,'C');
$pdf -> Cell(60,5,'Type',1,0,'C');
$pdf -> Cell(60,5,'Description',1,0,'C');
$pdf -> Cell(8,5,'Qty',1,0,'C');
$pdf -> Cell(33,5,'Unit Price',1,0,'C');
$pdf -> Cell(32,5,'Total',1,0,'C');

$pdf -> Ln();

$pdf -> SetWidths(Array(10, 60, 60, 8, 33, 32));
$pdf -> SetLineHeight(5);
$pdf -> SetAligns(Array('C','L','L','C','C','C'));

$pdf -> SetFont('Arial','', 9);
$num = 10;

$i = 0;
foreach ($_POST['type1'] as $key => $value) {
    ++$i;
    $type = $_POST['type1'][$key];
    $desc = $_POST['desc1'][$key];
    $qty = $_POST['qty1'][$key];
    $price = $_POST['unitPrice1'][$key];
    $amount = intval(preg_replace('/[^\d.]/', '' ,$_POST['amount1'][$key]));

    $pdf -> Row(Array($i.'.',
                      $type,
                      $desc,
                      $qty,
                      number_format($price,2, '.' , ','),
                      number_format($amount,2, '.' , ',')
                    )
                );

    $sumArray[] = $amount;
}

$pdf -> MultiCell(130,6,' '."\n".' ',1,'R');
$y = $pdf -> GetY();
$x = $pdf -> GetX();
$pdf-> SetXY($x+2,$y-11);
$pdf -> SetFont('Arial','B', 8);
$pdf -> Cell(25,4,'Company Policy',0,1,'L');
$pdf-> SetXY($x+1,$y-7);
$pdf -> SetFont('Arial','B', 10);
$pdf -> Cell(10,4,'1.',0,0,'C');
$pdf-> SetXY($x+33,$y-7);
$pdf -> SetFont('Arial','', 7);
$pdf -> Cell(10,4,'Employees are not allowed to use any illegal software.',0,0,'C');
$pdf-> SetXY($x+130,$y-12);
$pdf -> SetFont('Arial','', 9);
$pdf -> Cell(41,6,'Freight/Forwarding',1,0,'C');
$pdf -> Cell(32,6,'',1,1,'C');
$pdf-> SetX($x+130);
$pdf -> Cell(41,6,'TOTAL',1,0,'C');
$pdf -> Cell(32,6,number_format(array_sum($sumArray),2, '.' , ','),1,1,'C');

$pdf -> SetTextColor(255, 255, 255);
$pdf -> SetFont('Arial','B', 9);
$pdf -> Cell(76,5,'BUDGET INFORMATION',1,0,'C',true);
$pdf -> Cell(32,5, 'DATE NEEDED',1,0,'C',true);
$pdf -> Cell(95,5, 'PURPOSE OF REQUEST',1,1,'C',true);

$pdf -> SetTextColor(0, 0,0);
$pdf -> SetWidths(Array(76, 32, 95));
$pdf -> SetLineHeight(5);
$pdf -> SetAligns(Array('L','C','L'));
//Condition for image location
$x = $pdf->getX();
$y = $pdf->gety();

if ($budget == 'inbudget') {
    $pdf -> Image('../assets/circle.png',$x+1,$y+1,3,3);
    $pdf -> Image('../assets/check.png',$x+1.3,$y+.6,3,3);
    $pdf -> Image('../assets/circle.png',$x+23,$y+1,3,3);
    $pdf -> Image('../assets/circle.png',$x+53,$y+1,3,3);
}
else if ($budget == 'notinbudget') {
    $pdf -> Image('../assets/circle.png',$x+1,$y+1,3,3);
    $pdf -> Image('../assets/circle.png',$x+53,$y+1,3,3);
    $pdf -> Image('../assets/circle.png',$x+23,$y+1,3,3);
    $pdf -> Image('../assets/check.png',$x+23.3,$y+.6,3,3);
    $ioNum = '';
}
else if($budget =='expense'){
    $pdf -> Image('../assets/circle.png',$x+1,$y+1,3,3);
    $pdf -> Image('../assets/circle.png',$x+23,$y+1,3,3);
    $pdf -> Image('../assets/circle.png',$x+53,$y+1,3,3);
    $pdf -> Image('../assets/check.png',$x+53.3,$y+.6,3,3);
    $ioNum = '';
}

if ($usage == 'new') {
    $pdf -> Image('../assets/circle.png',$x+1,$y+10.9,3,3);
    $pdf -> Image('../assets/check.png',$x+1.3,$y+10.6,3,3);
    $pdf -> Image('../assets/circle.png',$x+1,$y+15.9,3,3);
    $pdf -> Image('../assets/circle.png',$x+1,$y+20.9,3,3);
}
else if ($usage == 'replace'){
    $pdf -> Image('../assets/circle.png',$x+1,$y+15.9,3,3);
    $pdf -> Image('../assets/check.png',$x+1.3,$y+15.6,3,3);
    $pdf -> Image('../assets/circle.png',$x+1,$y+10.9,3,3);
    $pdf -> Image('../assets/circle.png',$x+1,$y+20.9,3,3);
}
else if ($usage == 'additional'){
    $pdf -> Image('../assets/circle.png',$x+1,$y+10.9,3,3);
    $pdf -> Image('../assets/circle.png',$x+1,$y+15.9,3,3);
    $pdf -> Image('../assets/circle.png',$x+1,$y+20.9,3,3);
    $pdf -> Image('../assets/check.png',$x+1.3,$y+20.6,3,3);
}


$pdf -> SetFont('Arial','', 9);

$pdf -> Row(Array('    In Budget          Not In Budget            Expense'."\n"
                  .'    IO No: '.$ioNum."\n"
                  .'    New'."\n"
                  .'    Replacement'."\n"
                  .'    Additional',$dateNeeded,'USER: '.$reqUser."\n"
                  .                               'DEPARTMENT TO USE: '.$reqDept."\n"
                  .                               'LOCATION TO USE: '.$reqLoc."\n"
                  .                               'DETAILS: '.$reqDtl));
$pdf -> SetTextColor(255, 255, 255);
$pdf -> SetFont('Arial','B', 9);
$pdf -> Cell(203, 5,'REQUESTER & DELIVERY INFORMATION', 1,1,'C', true);

$pdf -> Ln(1);
$pdf -> SetTextColor(0, 0, 0);
$pdf -> SetFont('Arial','B', 9);
$pdf -> Cell(45, 5,'SmartHR ID:',0,0,'L');
$pdf -> SetFont('Arial','', 9);
$pdf -> Cell(130, 5,'PH0000664','B',1,'L');

$pdf -> SetFont('Arial','B', 9);
$pdf -> Cell(45, 5,'Requester:',0,0,'L');
$pdf -> SetFont('Arial','', 9);
$pdf -> Cell(130, 5,'Ms. Mayvelyn D. Arcas','B',1,'L');

$pdf -> SetFont('Arial','B', 9);
$pdf -> Cell(45, 5,'Position:',0,0,'L');
$pdf -> SetFont('Arial','', 9);
$pdf -> Cell(130, 5,'IT Officer','B',1,'L');

$pdf -> SetFont('Arial','B', 9);
$pdf -> Cell(45, 5,'Department:',0,0,'L');
$pdf -> SetFont('Arial','', 9);
$pdf -> Cell(130, 5,'IT Department','B',1,'L');

$pdf -> SetFont('Arial','B', 9);
$pdf -> Cell(45, 5,'Contact No:',0,0,'L');
$pdf -> SetFont('Arial','', 9);
$pdf -> Cell(130, 5,'09056433494','B',1,'L');

$pdf -> SetFont('Arial','B', 9);
$pdf -> Cell(45, 5,'Corporate Email:',0,0,'L');
$pdf -> SetFont('Arial','', 9);
$pdf -> Cell(130, 5,'mayvelyn.cru@cpf-phil.com','B',1,'L');

$pdf -> SetFont('Arial','B', 9);
$pdf -> Cell(45, 5,'Plant Code and Name:',0,0,'L');
$pdf -> SetFont('Arial','', 9);
$pdf -> Cell(130, 5,$plantCode.' - '.$plantName,'B',1,'L');

$pdf -> Ln(1.6);
$pdf -> SetTextColor(255, 255, 255);
$pdf -> SetFont('Arial','B', 9);
$pdf -> Cell(70,5,'REQUESTER',1,0,'C', true);
$pdf -> Cell(70,5,'HEAD OF DEPARTMENT',1,0,'C', true);
$pdf -> Cell(63,5,'EXECUTIVE/BU HEAD',1,1,'C', true);

$pdf->Cell(70,28,'',1,0,'C');
$pdf->Cell(70,28,'',1,0,'C');
$pdf->Cell(63,28,'',1,1,'C');

$x = $pdf->getX();
$y = $pdf->gety();
$pdf -> SetTextColor(0, 0, 0);
$pdf -> SetFont('Arial','', 9);
$pdf->SetXY($x+13, $y-19);
$pdf -> Cell(45,5,'Ms. Mayvelyn Arcas','B',0,'C');
$pdf->SetXY($x+13, $y-12);
$pdf -> Cell(45,5,'Requested By',0,0,'C');

$x = $pdf->getX();
$y = $pdf->gety();
$pdf->SetXY($x+25,$y-7);
$pdf -> Cell(45,5,'Mr. Park Kitchaichankul','B',0,'C');
$pdf->SetXY($x+24, $y);
$pdf -> Cell(45,5,'Verify By',0,0,'C');

$x = $pdf->getX();
$y = $pdf->gety();
$pdf->SetXY($x+25,$y-7);
$pdf -> Cell(45,5,'Mr. Montree Srihamontree','B',0,'C');
$pdf->SetXY($x+24, $y);
$pdf -> Cell(45,5,'Approved By',0,1,'C');

$pdf->Ln();
$pdf -> SetTextColor(255, 0, 0);
$pdf -> SetFont('Arial','B', 9);
$pdf -> Cell(70,5,'NOTE',1,0,'C', true);
$pdf -> SetTextColor(255, 255, 255);
$pdf -> Cell(70,5,'IT DEPARTMENT',1,0,'C', true);
$pdf -> Cell(63,5,'IT DEPARTMENT',1,1,'C', true);

$pdf -> SetTextColor(255, 0, 0);
$pdf->Cell(70,28,'',1,0,'C');
$pdf->Cell(70,28,'',1,0,'C');
$pdf->Cell(63,28,'',1,1,'C');

$x = $pdf->getX();
$y = $pdf->gety();
$pdf->SetXY($x+2.5,$y-20);
$pdf -> SetFont('Arial','B', 9);
$pdf -> MultiCell(65,5,'This IT Requisition is system generated and Document status is Approved',0,'C');

$pdf -> SetTextColor(0, 0, 0);

$x = $pdf->getX();
$y = $pdf->gety();
$pdf->SetXY($x+83,$y-10);
$pdf -> SetFont('Arial','', 9);
$pdf -> Cell(45,5,'Mr. Park Kitchaichankul','B',0,'C');
$pdf->SetXY($x+82, $y-3);
$pdf -> Cell(45,5,'Endorsed By',0,1,'C');

$x = $pdf->getX();
$y = $pdf->gety();
$pdf->SetXY($x+152,$y-12);
$pdf -> SetFont('Arial','', 9);
$pdf -> Cell(45,5,'Ms. Mayvelyn Arcas','B',0,'C');
$pdf->SetXY($x+151, $y-5);
$pdf -> Cell(45,5,'Checked By',0,1,'C');
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',8);
$pdf -> Cell(0,5,'Charoen Pokphand Foods Philippines Corporation',0,1,'L');
$pdf -> SetFont('Arial','',7);
$pdf -> Cell(108,5,'Agro Address: Km. 141-142 Mc Arthur Highway, Brgy. Caturay, Gerona, Tarlac, Phillipines 2302',0,0,'L');
$pdf -> Cell(45,5, 'Cellphone No: Sun: +63 923 342 8443',0,0,'L');
$pdf -> Cell(45,5, 'Smart: +63 947 438 4741',0,1,'L');

$pdf -> Cell(108,5,'Aqua Address: KM 111 Roman Super Hi-Way, Brgy. Gugo, Samal, Bataan, Phillipines 2113',0,0,'L');
$pdf -> Cell(45,5, 'Cellphone No: Sun: +63 933 921 8827',0,0,'L');
$pdf -> Cell(45,5, 'Globe: +63 915 768 4372',0,1,'L');
$pdf -> Output();
}