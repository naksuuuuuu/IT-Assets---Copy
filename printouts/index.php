<?php


require '../fpdf/mc_indent.php';

$pdf = new PDF('P', 'mm', 'A4');
$pdf -> AddPage();
$pdf -> SetLeftMargin(4);
$pdf -> Image('itcenter.png', 10,7,35,0,'PNG');
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(0,5,'Asset ID: 1579   ', 0,1,'R');
$pdf -> SetFont('Arial','B',18);
$pdf -> Cell(0,5,'Receiving / Returning of Asset Form',0,1,'C');
$pdf -> Ln(5);
$pdf -> SetFont('Arial','',11);
$pdf -> Cell(0,5,'Date: 2023-04-29   ', 0,1,'R'); //dynamic
$pdf -> Ln(4);
$pdf -> SetFont('Arial','',10);
$pdf -> Cell(50,5,'Name: ',0,0,'L');
$pdf -> Cell(68,5,'Mr. Harlan D. Ronquillo','B',1,'L'); //dynamic
$pdf -> Ln(1);
$pdf -> Cell(50,5,'Current Address: ',0,0,'L');
$pdf -> Cell(68,5,'#Temp 69','B',1,'L'); //dynamic
$pdf -> Ln(1);
$pdf -> Cell(50,5,'Mobile No: ',0,0,'L');
$pdf -> Cell(68,5,'09457284116','B',0,'L'); //dynamic
$pdf -> Cell(27,5,'Office Phone: ',0,0,'L');
$pdf -> Cell(0,5,'09457284116','B',1,'L'); //dynamic

$pdf -> Ln(1);
$pdf -> Cell(50,5,'Personal Email: ',0,0,'L');
$pdf -> Cell(68,5,'hdronquillo29@gmail.com','B',1,'L'); //dynamic
$pdf -> Ln(3);
$pdf -> Cell(195,1,'',0,1,'L',true);

$pdf -> Ln(5);
$pdf -> Cell(50,5,'Department: ',0,0,'L');
$pdf -> Cell(68,5,'AGRO - Tarlac Feedmill IT Center', 'B',0,'L'); //dynamic
$pdf -> SetY(62);
$pdf -> SetX(122);
$pdf -> MultiCell(27,5,'Start Working Date:',0,'L');
$pdf -> SetY(66);
$pdf -> SetX(149);
$pdf -> Cell(0,5,'May 5,2023','B',1,'L'); //dynamic
$pdf -> Ln(1);
$pdf -> Cell(50,5,'Employee ID Card Number: ',0,0,'L');
$pdf -> Cell(68,5,'PH0006969','B',1,'L'); //dynamic
$pdf -> Rect(5,83,190,75);
$pdf -> Ln(7);
$pdf -> SetFont('Arial','B',10);
$pdf -> Cell(0,5,'Assets assigned to employee for work and responsiblity',0,1,'C');
$pdf -> Line(5,90,195,90);

$pdf -> SetFont('Arial','',10);
$x = $pdf -> GetX();
$pdf -> Ln(8);
$pdf -> SetX($x+2);

$pdf -> Cell(30,5,'Asset Type: ',0,0,'L');
$pdf -> SetFont('Arial','B',10);
$pdf -> Cell(130,5,'Notebook Computer Lenovo i5','B',1,'L'); //dynamic
$pdf -> Ln(10);
$pdf -> SetX($x+20);
$pdf -> SetFont('Arial','',10);
$pdf -> Cell(25,5,'Brand: ',0,0,'L');
$pdf -> Cell(27,5,'Lenovo', 'B',0,'L'); //dynamic
$x = $pdf -> GetX();
$pdf -> SetX($x+10);
$pdf -> Cell(25,5,'PO Number: ',0,0,'L');
$pdf -> Cell(27,5,'4500420696', 'B',1,'L'); //dynamic
$pdf -> Ln(1);
$x = $pdf -> GetX();
$pdf -> SetX($x+20);
$pdf -> Cell(25,5,'Serial No: ',0,0,'L');
$pdf -> Cell(27,5,'FKU69420S', 'B',0,'L'); //dynamic
$x = $pdf -> GetX();
$pdf -> SetX($x+10);
$pdf -> Cell(25,5,'Delivery Note: ',0,0,'L');
$pdf -> Cell(27,5,'42069', 'B',1,'L'); //dynamic
$x = $pdf -> GetX();
$pdf -> Ln(1);
$pdf -> SetX($x+20);
$pdf -> Cell(25,5,'Delivery Date: ',0,0,'L');
$pdf -> Cell(27,5,'2023-01-03', 'B',1,'L'); //dynamic
$pdf -> Ln(1);
$pdf -> SetX($x+20);
$pdf -> Cell(25,5,'Asset Code: ',0,0,'L');
$pdf -> Cell(27,5,'FKU69420S', 'B',0,'L'); //dynamic
$x = $pdf -> GetX();
$pdf -> SetX($x+10);
$pdf -> Cell(25,5,'Status: ',0,0,'L');
$pdf -> Cell(27,5,'Active', 'B',1,'L'); //dynamic
$pdf -> Ln(5);
$x = $pdf -> GetX();
$pdf -> SetX($x+2);
$pdf -> Cell(18,5,'Remarks: ',0,0,'L');

$pdf -> MultiCell(160,5,'Notebook Computer Lenovo i5Lenovo IdeaPad Slim 3i 15.6inch i5-1235U Iris Xe Graphics 8GB RAM 512GB SSD WIN11',0,'L'); //dynamic
$pdf -> Ln(12);
$pdf -> SetFont('Arial','B',10);
$pdf -> Cell(0,5,'Terms and Conditions',0,1,'L');
$pdf -> SetFont('Arial','',8);
$pdf -> MultiCell(0,4,'Employees must use the computer and the network exclusively for duties only. It should always be reminded '.
                         'that the company shall has the recording and monitoring at all time. If done in a manner that causes damage to '.
                         'the Company, Employee shall have a disciplinary action as defined in the working regulations. If the action '.
                         'done violates the law regarding publishing, sending, or forwarding an abusive message, including the installation '.
                         'of pirated software, employees shall be punished in private according to the law provisions.',0,'L',false,15);
$pdf -> Ln(2);
$pdf -> Cell(195,1,'',0,1,'L',true);
$pdf -> Ln(4);
$pdf -> SetFont('Arial','',10);
$pdf -> Cell(95,5,'Receive (Reference Person)',0,0,'C');
$pdf -> Cell(90,5,'Return (Reference Person)',0,1,'C');
$pdf -> Cell(95,5,'_________________________',0,0,'C');
$pdf -> Cell(90,5,'_________________________',0,1,'C');
$pdf -> Cell(95,5,'(......./......./.......)',0,0,'C');
$pdf -> Cell(90,5,'(......./......./.......)',0,1,'C');

$pdf -> Ln(15);
$pdf -> Cell(95,5,'Received by (Requester)',0,0,'C');
$pdf -> Cell(90,5,'Returned by (Requester)',0,1,'C');
$pdf -> Cell(95,5,'_________________________',0,0,'C');
$pdf -> Cell(90,5,'_________________________',0,1,'C');
$pdf -> Cell(95,5,'(......./......./.......)',0,0,'C');
$pdf -> Cell(90,5,'(......./......./.......)',0,1,'C');

$pdf -> Ln(15);
$pdf -> Cell(95,5,'Approved by (Supervisor)',0,0,'C');
$pdf -> Cell(90,5,'Approved by (Supervisor)',0,1,'C');
$pdf -> Cell(95,5,'_________________________',0,0,'C');
$pdf -> Cell(90,5,'_________________________',0,1,'C');
$pdf -> Cell(95,5,'(......./......./.......)',0,0,'C');
$pdf -> Cell(90,5,'(......./......./.......)',0,1,'C');

$pdf -> Output('Hello.pdf', 'I');