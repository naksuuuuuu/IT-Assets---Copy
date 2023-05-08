<?php 

require "../config/connection.php";
require '../fpdf/mc_indent.php';

if(isset($_POST['po_number'])){
$empId = $_POST['employee_id'];
$empId2 = $_POST['employee_id2'];
$poNo = $_POST['po_number'];
$poItem = $_POST['po_item'];

        $query = "SELECT a.SERIAL_NO1, a.SERIAL_NO2, a.SERIAL_NO3, a.SERIAL_NO4, b.BRAND_NAME, c.MODEL, d.ASSET_SUB_GROUP_NAME, 
        to_date(e.TRANSFER_DATE, 'DD/MM/YY') as transfer_date, a.ASS_CODE, a.MTRL_SHORT
        from IT_ASSET_DETAILS1 a, IT_ASSET_BRAND b, IT_ASSET_MODEL c, IT_ASSET_SUB_GROUP d, IT_ASSET_TRANSFER_TRN_HDR e
        where a.PO_NUMBER = :poNo
        and a.PO_ITEM = :poItem
        and a.MODEL = c.MODEL_CODE
        and a.BRAND = b.BRAND_CODE
        and a.SUB_ASSET_GROUP = d.ASSET_SUB_GROUP_CODE
        and a.DOCUMENT_NO = e.REF_DOC_NO	";
        
        $stmt = oci_parse(connection(), $query);
        oci_bind_by_name($stmt, ':poNo', $poNo);
        oci_bind_by_name($stmt, ':poItem', $poItem);
        oci_execute($stmt);
        $row = oci_fetch_assoc($stmt);

        $tranferFrom = "SELECT A.NAMEENG, d.DESCR, c.DESCR AS LOCATION from PERSON_TBL a, JobCur_ee b,  location_tbl c, DEPARTMENT_TBL d
            WHERE a.EMPLID = b.EMPLID
            and b.LOCATION = c.LOCATION
            AND b.DEPTID = d.DEPTID
            and b.EMPL_STATUS = 'A'
            and a.EMPLID = :emp_id";
        
        $res2 = oci_parse(connection1(), $tranferFrom);
        oci_bind_by_name($res2, ':emp_id', $empId);
        oci_execute($res2);
        $row2 = oci_fetch_assoc($res2);

        $tranferTo = "SELECT A.NAMEENG, d.DESCR, c.DESCR AS LOCATION from PERSON_TBL a, JobCur_ee b,  location_tbl c, DEPARTMENT_TBL d
        WHERE a.EMPLID = b.EMPLID
        and b.LOCATION = c.LOCATION
        AND b.DEPTID = d.DEPTID
        and b.EMPL_STATUS = 'A'
        and a.EMPLID = :emp_id";
    
    $res3 = oci_parse(connection1(), $tranferTo);
    oci_bind_by_name($res3, ':emp_id', $empId2);
    oci_execute($res3);
    $row3 = oci_fetch_assoc($res3);

    $max_doc = "SELECT max(DOCUMENT_NO) AS DOCUMENT_NO FROM IT_ASSET_TRANSFER_TRN_HDR";
    $res4 = oci_parse(connection(), $max_doc);
    oci_execute($res4);
    $row4 = oci_fetch_assoc($res4);
                
        $pdf = new PDF('P', 'mm', 'A4');
        $pdf -> AddFont('Gothic', "", 'CenturyGothic.php');
        $pdf -> AddFont('Gothic', "B", 'GOTHICB0.php');
        $pdf -> AddPage();
        $pdf -> SetLeftMargin(4);
        $x = $pdf -> GetX();
        $pdf -> SetFont('Gothic','B',10);
        $pdf -> Cell(0,5,'Doc No: '.$row4['DOCUMENT_NO'],0,0,'R'); //doc no
        $pdf -> Image('itcenter.png', 17,7,35,0,'PNG');
        $pdf -> SetX($x+5);
        $pdf -> SetFont('Gothic','B',14);
        $pdf -> Cell(0,15,'ASSET TRANSFER NOTIFICATION', 0,1,'C');
        $x = $pdf -> GetX();
        $pdf -> SetX($x+5);
        $pdf -> SetFont('Gothic','',10);
        $pdf -> Cell(0,5,'Date: '.date("d/m/Y", strtotime($row["TRANSFER_DATE"])),0,0,'R');  //dynamic
        $pdf -> Ln(3);
        $pdf -> Rect(5,30,195,258);
        $pdf -> Ln(3);
        $pdf -> SetFont('Gothic','B',10);
        $pdf -> Cell(0,5,'PART I - TRANSFER BY', 0,1,'C');
        $pdf -> Ln(5);
        $pdf -> SetFont('Gothic','',8);
        $pdf -> SetX($x+5);
        $pdf -> Cell(50,5,'Transferred By:', 0,0,'L');
        $pdf -> Cell(135,5,$row2["NAMEENG"], 1,1,'L'); //dynamic
        $pdf -> Ln(3);
        $pdf -> SetX($x+5);
        $pdf -> Cell(50,5,'Department/Position:', 0,0,'L');
        $pdf -> Cell(135,5,$row2['DESCR'], 1,1,'L'); //dynamic
        $pdf -> Ln(3);
        $pdf -> SetX($x+5);
        $pdf -> Cell(50,5,'Location:', 0,0,'L');
        $pdf -> MultiCell(135,5,$row2['LOCATION'],1,'L',false,0); //dynamic
        $pdf -> Ln(3);
        $pdf -> SetX($x+5);
        $pdf -> Cell(50,5,'Signature:', 0,0,'L');
        $pdf -> Cell(135,5,'_________________________________________', 0,1,'C');
        $pdf -> Ln(3);
        $pdf -> SetX($x+5);
        $pdf -> Cell(50,5,'Date:', 0,0,'L');
        $pdf -> Cell(135,5,'_____________/_____________/_____________', 0,1,'C');
        $pdf -> Ln(0);
        $pdf -> SetX($x+5);
        $pdf -> Cell(15,5,'__________________________________________________________________________________________________________________________________', 0,0,'J');
        $pdf -> Ln(1);
        $pdf -> SetX($x+5);
        $pdf -> Cell(15,5,'__________________________________________________________________________________________________________________________________', 0,0,'J');
        $pdf -> Ln(5);
        $pdf -> SetFont('Gothic','B',10);
        $pdf -> Cell(0,5,'PART II - TRANSFER TO', 0,1,'C');
        $pdf -> Ln(5);
        $pdf -> SetFont('Gothic','',8);
        $pdf -> SetX($x+5);
        $pdf -> Cell(50,5,'Transferred To/New Custodian:', 0,0,'L');
        $pdf -> Cell(135,5,$row3["NAMEENG"], 1,1,'L'); //dynamic
        $pdf -> Ln(3);
        $pdf -> SetX($x+5);
        $pdf -> Cell(50,5,'Department/ Position:', 0,0,'L');
        $pdf -> Cell(135,5,$row3['DESCR'], 1,1,'L'); //dynamic
        $pdf -> Ln(3);
        $pdf -> SetX($x+5);
        $pdf -> Cell(50,5,'Location:', 0,0,'L');
        $pdf -> MultiCell(135,5,$row3['LOCATION'],1,'L',false,0); //dynamic
        $pdf -> Ln(3);
        $pdf -> SetX($x+5);
        $pdf -> Cell(50,5,'Signature:', 0,0,'L');
        $pdf -> Cell(135,5,'_________________________________________', 0,1,'C');
        $pdf -> Ln(3);
        $pdf -> SetX($x+5);
        $pdf -> Cell(50,5,'Date:', 0,0,'L');
        $pdf -> Cell(135,5,'_____________/_____________/_____________', 0,1,'C');
        $pdf -> Ln(0);
        $pdf -> SetX($x+5);
        $pdf -> Cell(15,5,'__________________________________________________________________________________________________________________________________', 0,0,'J');
        $pdf -> Ln(1);
        $pdf -> SetX($x+5);
        $pdf -> Cell(15,5,'__________________________________________________________________________________________________________________________________', 0,0,'J');
        $pdf -> Ln(5);
        $pdf -> SetFont('Gothic','B',10);
        $pdf -> Cell(0,5,'Asset assigned to employee for work and reponsibility', 0,1,'C');
        $pdf -> Ln(5);
        $pdf -> SetFont('Gothic','B',10);
        $pdf -> SetX($x+5);
        $pdf -> Cell(50,5,'Asset Type:', 0,0,'L');
        $pdf -> SetFont('Gothic','',8);
        $pdf -> Cell(40,5,$row["ASSET_SUB_GROUP_NAME"],'B',1,'C'); //dynamic
        // $x = $pdf -> GetX();
        // $pdf -> SetX($x+18);
        // $pdf -> Cell(45,5,'Desktop', 0,0,'L');
        // $pdf -> Image('../image/oblong.png',15,151,5,3);
        // $pdf -> Cell(45,5,'Laptop', 0,0,'L');
        // $pdf -> Image('../image/oblong.png',60,151,5,3);
        // $pdf -> Image('../image/check.png',61,150,5,3);
        // $pdf -> Cell(30,5,'Printer', 0,0,'L');
        // $pdf -> Image('../image/oblong.png',105,151,5,3);
        // $pdf -> Cell(50,5,'Other ____________________', 0,0,'L');
        // $pdf -> Image('../image/oblong.png',135,151,5,3);
        // $pdf -> Ln(5);
        // $pdf -> SetFont('Gothic','',8);
        // $x = $pdf -> GetX();
        // $pdf -> SetX($x+7);
        // $pdf -> Cell(0,5,'Equipment:',0,0,'L');
        // $pdf -> Ln(3);
        // $pdf -> SetX($x+18);
        // $pdf -> Cell(45,7,'Adaptor', 0,0,'L');
        // $pdf -> Image('../image/circle.png',15,155,4,3);
        // $pdf -> Cell(45,7,'Drivers', 0,0,'L');
        // $pdf -> Image('../image/circle.png',60,155,4,3);
        // $pdf -> Cell(45,7,'Bag', 0,0,'L');
        // $pdf -> Image('../image/circle.png',105,155,4,3);
        // $pdf -> Ln(5);
        // $pdf -> SetX($x+18);
        // $pdf -> Cell(45,7,'Mouse', 0,0,'L');
        // $pdf -> Image('../image/circle.png',15,160,4,3);
        // $pdf -> Cell(45,7,'Manual', 0,0,'L');
        // $pdf -> Image('../image/circle.png',60,160,4,3);
        // $pdf -> Cell(45,7,'External DVD', 0,0,'L');
        // $pdf -> Image('../image/circle.png',105,160,4,3);
        $pdf -> Ln(5);
        $pdf -> SetX($x+5);
        $pdf -> SetFont('Gothic','',8);
        $pdf -> Cell(50,5, 'Brand:',0,0,'L');
        $pdf -> Cell(135,5,$row['BRAND_NAME'],1,1,'L'); //dynamic
        $pdf -> SetX($x+5);
        $pdf -> Cell(50,5, 'Model:',0,0,'L');
        $pdf -> Cell(135,5,$row["MODEL"],1,1,'L'); //dynamic
        $pdf -> SetX($x+5);
        $pdf -> Cell(50,5, 'Serial Number 1:',0,0,'L');
        $pdf -> Cell(135,5,$row["SERIAL_NO1"],1,1,'L'); //dynamic
        $pdf -> SetX($x+5); 
        $pdf -> Cell(50,5, 'Serial Number 2:',0,0,'L');
        $pdf -> Cell(135,5,$row["SERIAL_NO2"],1,1,'L'); //dynamic
        $pdf -> SetX($x+5);
        $pdf -> Cell(50,5, 'Asset Code:',0,0,'L');
        $pdf -> Cell(135,5,$row["ASS_CODE"],1,1,'L'); //dynamic
        $pdf -> SetX($x+5);
        $pdf -> Cell(50,5, 'Item Description(s):',0,0,'L');
        $pdf -> MultiCell(135,5,$row["MTRL_SHORT"],1,'L',false,0); //dynamic
        $pdf -> Ln(5);
        $pdf -> Cell(15,5,'     __________________________________________________________________________________________________________________________________', 0,0,'J');
        $pdf -> Ln(1);
        $pdf -> Cell(15,5,'     __________________________________________________________________________________________________________________________________', 0,0,'J');
        $pdf -> Ln(5);
        $pdf -> SetFont('Gothic','B',10);
        $pdf -> Cell(0,5,'Terms and Conditions:', 0,1,'C');
        $pdf -> SetFont('Gothic','',8);
        $pdf -> MultiCell(0,4,'Employess must use the computer and the network exclusively for duties only. It should always be reminded that the company '.
                            'shall has the recording and monitoring at all time. If done in a manner that causes damage to the Company. Employee shall have '.
                            'a disciplinary action as defined in the working regulations. If the action done violates the law regarding publishing, sending, '. 
                            'or forwarding an abusive message, including the installation of pirated software, employees shall be punished in private according '. 
                            'to the law provisions.',0,'C',false,5);
        $pdf -> Cell(15,5,'     __________________________________________________________________________________________________________________________________', 0,0,'J');
        $pdf -> Ln(1);
        $pdf -> Cell(15,5,'     __________________________________________________________________________________________________________________________________', 0,0,'J');
        $pdf -> Ln(10);
        $pdf -> SetX($x+5);
        $pdf -> SetFont('Gothic','B',8);
        $pdf -> Cell(90,5,'IT DEPARTMENT', 1,0,'C');
        $pdf -> Cell(95,5,'DEPARTMENT MANAGER',1,1,'C');
        $pdf -> SetX($x+5);
        $pdf -> SetFont('Gothic','',8);
        $pdf -> Rect(9,235,90,47);
        $pdf -> Cell(90,5,'Notified to', 0,0,'C');
        $pdf -> Rect(99,235,95,47);
        $pdf -> Cell(95,5,'Approved by',0,1,'C');
        $pdf -> Ln(13);
        $pdf -> SetX($x+5);
        $pdf -> Cell(90,5,'__________________________________',0,0,'C');
        $pdf -> Cell(95,5,'__________________________________',0,1,'C');
        $pdf -> SetX($x+5);
        $pdf -> Cell(90,5,'(                                                           )',0,0,'C');
        $pdf -> Cell(95,5,'(                                                           )',0,1,'C');
        $pdf -> SetX($x+5);
        $pdf -> Cell(90,5,'Position:',0,0,'C');
        $pdf -> Cell(95,5,'Position:',0,1,'C');
        $pdf -> SetX($x+5);
        $pdf -> Cell(90,5,'__________/__________/__________',0,0,'C');
        $pdf -> Cell(95,5,'__________/__________/__________',0,1,'C');

        $pdf->Output('transfer.pdf', 'I');
}