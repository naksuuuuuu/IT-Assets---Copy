<?php

require "../config/connection.php";
require '../fpdf/mc_indent.php';

if(isset($_POST['po_number'])){
    $po_no = $_POST['po_number'];
    $po_item = $_POST['po_item'];

    $sql = "SELECT DISTINCT D.ASSET_SUB_GROUP_NAME, C.BRAND_NAME, B.SERIAL_NO1, B.DEL_DATE, B.ASS_CODE, 
        A.PO_NUMBER, B.DEL_NOTE, A.DOCUMENT_NO, A.STATUS, B.REMARKS, B.EMPL_ID, B.ASSET_ID, B.DOCUMENT_DATE
        FROM IT_ASSET_HEADER1 A, IT_ASSET_DETAILS1 B, IT_ASSET_BRAND C, IT_ASSET_SUB_GROUP D
        WHERE A.DOCUMENT_NO = B.DOCUMENT_NO
        AND B.SUB_ASSET_GROUP = D.ASSET_SUB_GROUP_CODE
        AND B.BRAND = C.BRAND_CODE
        AND A.CANCEL_ASSET_FLAG is null
        AND B.PO_NUMBER = :po_no
        AND B.PO_ITEM = :po_item
        ORDER BY A.DOCUMENT_NO DESC";

    $res = oci_parse(connection(), $sql);
    oci_bind_by_name($res, ':po_no', $po_no);
    oci_bind_by_name($res, ':po_item', $po_item);
    oci_execute($res);

    while($row = oci_fetch_assoc($res)){
        $empId = $row["EMPL_ID"];

        $conn2 = "SELECT a.NAMEENG, concat(a.TAMBOL, a.AMPHUR) as ADDRESS, a.MOBILEPHONE, a.PERSONELMAIL, a.OFFICEPHONE, 
            d.DESCR, a.HIRE_DATE
            from PERSON_TBL a, JobCur_ee b , 
            location_tbl c, DEPARTMENT_TBL d
            WHERE a.EMPLID = b.EMPLID
            and b.LOCATION = c.LOCATION
            AND b.DEPTID = d.DEPTID
            and b.EMPL_STATUS = 'A'
            and a.EMPLID = :empl_name";
        
        $res2 = oci_parse(connection1(), $conn2);
        oci_bind_by_name($res2, ':empl_name', $empId);
        oci_execute($res2);

        $row2 = oci_fetch_assoc($res2);

        $pdf = new PDF('P', 'mm', 'A4');
        $pdf -> AddFont('Gothic', "", 'CenturyGothic.php');
        $pdf -> AddFont('Gothic', "B", 'GOTHICB0.php');
        $pdf -> AddPage();
        $pdf -> SetLeftMargin(4);
        $pdf -> Image('itcenter.png', 10,7,35,0,'PNG');
        $pdf -> SetFont('Gothic','B',12);
        $pdf -> Cell(0,5,'Asset ID:   ' .$row["ASSET_ID"], 0,1,'R');
        $pdf -> SetFont('Gothic','B',18);
        $pdf -> Cell(0,5,'Receiving / Returning of Asset Form',0,1,'C');
        $pdf -> Ln(5);
        $pdf -> SetFont('Gothic','',11);
        $pdf -> Cell(0,5,'Date:    ' .date("d/m/Y", strtotime($row["DOCUMENT_DATE"])), 0,1,'R'); //dynamic
        $pdf -> Ln(4);
        $pdf -> SetFont('Gothic','',10);
        $pdf -> Cell(50,5,'Name: ',0,0,'L');
        $pdf -> Cell(68,5,$row2["NAMEENG"],'B',1,'L'); //dynamic
        $pdf -> Ln(1);
        $pdf -> Cell(50,5,'Current Address: ',0,0,'L');
        $pdf -> Cell(68,5,$row2["ADDRESS"],'B',1,'L'); //dynamic
        $pdf -> Ln(1);
        $pdf -> Cell(50,5,'Mobile No: ',0,0,'L');
        $pdf -> Cell(68,5,$row2["MOBILEPHONE"],'B',0,'L'); //dynamic
        $pdf -> Cell(27,5,'Office Phone: ',0,0,'L');
        $pdf -> Cell(0,5,$row2["OFFICEPHONE"],'B',1,'L'); //dynamic

        $pdf -> Ln(1);
        $pdf -> Cell(50,5,'Personal Email: ',0,0,'L');
        $pdf -> Cell(68,5,$row2["PERSONELMAIL"],'B',1,'L'); //dynamic
        $pdf -> Ln(3);
        $pdf -> Cell(195,1,'',0,1,'L',true);

        $pdf -> Ln(5);
        $pdf -> Cell(50,5,'Department: ',0,0,'L');
        $pdf -> Cell(68,5, $row2["DESCR"], 'B',0,'L'); //dynamic
        $pdf -> SetY(62);
        $pdf -> SetX(122);
        $pdf -> MultiCell(27,5,'Start Working Date:',0,'L');
        $pdf -> SetY(66);
        $pdf -> SetX(149);
        $pdf -> Cell(0,5,date("d/m/Y", strtotime($row2["HIRE_DATE"])),'B',1,'L'); //dynamic
        $pdf -> Ln(1);
        $pdf -> Cell(50,5,'Employee ID Card Number: ',0,0,'L');
        $pdf -> Cell(68,5,$row["EMPL_ID"],'B',1,'L'); //dynamic
        $pdf -> Rect(5,83,190,75);
        $pdf -> Ln(7);
        $pdf -> SetFont('Gothic','B',10);
        $pdf -> Cell(0,5,'Assets assigned to employee for work and responsiblity',0,1,'C');
        $pdf -> Line(5,90,195,90);

        $pdf -> SetFont('Gothic','',10);
        $x = $pdf -> GetX();
        $pdf -> Ln(8);
        $pdf -> SetX($x+2);

        $pdf -> Cell(30,5,'Asset Type: ',0,0,'L');
        $pdf -> SetFont('Gothic','B',10);
        $pdf -> Cell(130,5,$row["ASSET_SUB_GROUP_NAME"],'B',1,'L'); //dynamic
        $pdf -> Ln(10);
        $pdf -> SetX($x+20);
        $pdf -> SetFont('Gothic','',10);
        $pdf -> Cell(25,5,'Brand: ',0,0,'L');
        $pdf -> Cell(27,5,$row['BRAND_NAME'], 'B',0,'L'); //dynamic
        $x = $pdf -> GetX();
        $pdf -> SetX($x+10);
        $pdf -> Cell(25,5,'PO Number: ',0,0,'L');
        $pdf -> Cell(27,5,$row["PO_NUMBER"], 'B',1,'L'); //dynamic
        $pdf -> Ln(1);
        $x = $pdf -> GetX();
        $pdf -> SetX($x+20);
        $pdf -> Cell(25,5,'Serial No: ',0,0,'L');
        $pdf -> Cell(27,5,$row['SERIAL_NO1'], 'B',0,'L'); //dynamic
        $x = $pdf -> GetX();
        $pdf -> SetX($x+10);
        $pdf -> Cell(25,5,'Delivery Note: ',0,0,'L');
        $pdf -> Cell(27,5,$row["DEL_NOTE"], 'B',1,'L'); //dynamic
        $x = $pdf -> GetX();
        $pdf -> Ln(1);
        $pdf -> SetX($x+20);
        $pdf -> Cell(25,5,'Delivery Date: ',0,0,'L');
        $pdf -> Cell(27,5,date("d/m/Y", strtotime($row["DEL_DATE"])), 'B',1,'L'); //dynamic
        $pdf -> Ln(1);
        $pdf -> SetX($x+20);
        $pdf -> Cell(25,5,'Asset Code: ',0,0,'L');
        $pdf -> Cell(27,5,$row["ASS_CODE"], 'B',0,'L'); //dynamic
        $x = $pdf -> GetX();
        $pdf -> SetX($x+10);
        $pdf -> Cell(25,5,'Status: ',0,0,'L');
        $pdf -> Cell(27,5,$row["STATUS"], 'B',1,'L'); //dynamic
        $pdf -> Ln(5);
        $x = $pdf -> GetX();
        $pdf -> SetX($x+2);
        $pdf -> Cell(18,5,'Remarks: ',0,0,'L');

        $pdf -> MultiCell(160,5,$row["REMARKS"],0,'L'); //dynamic
        $pdf -> Ln(18);
        $pdf -> SetFont('Gothic','B',10);
        $pdf -> Cell(0,5,'Terms and Conditions',0,1,'L');
        $pdf -> SetFont('Gothic','',8);
        $pdf -> MultiCell(0,4,'Employees must use the computer and the network exclusively for duties only. It should always be reminded '.
                                'that the company shall has the recording and monitoring at all time. If done in a manner that causes damage to '.
                                'the Company, Employee shall have a disciplinary action as defined in the working regulations. If the action '.
                                'done violates the law regarding publishing, sending, or forwarding an abusive message, including the installation '.
                                'of pirated software, employees shall be punished in private according to the law provisions.',0,'L',false,15);
        $pdf -> Ln(5);
        $pdf -> Cell(195,1,'',0,1,'L',true);
        $pdf -> Ln(5);
        $pdf -> SetFont('Gothic','',10);
        $pdf -> Cell(105,5,'    Receive (Reference Person)',0,0,'L');
        $pdf -> Cell(90,5,'Return (Reference Person)      ',0,1,'R');
        $pdf -> Cell(105,8,'________________________________',0,0,'L');
        $pdf -> Cell(90,8,'________________________________',0,1,'R');
        $pdf -> Cell(105,5,'(                                                       )',0,0,'L');
        $pdf -> Cell(90,5,'(                                                       )',0,1,'R');
        $pdf -> Cell(105,2,'              (......./......./.......)',0,0,'L');
        $pdf -> Cell(90,2,'(......./......./.......)               ',0,1,'R');

        $pdf -> Ln(10);
        $pdf -> Cell(105,5,'    Receive (Reference Person)',0,0,'L');
        $pdf -> Cell(90,5,'Return (Reference Person)      ',0,1,'R');
        $pdf -> Cell(105,8,'________________________________',0,0,'L');
        $pdf -> Cell(90,8,'________________________________',0,1,'R');
        $pdf -> Cell(105,5,'(                                                       )',0,0,'L');
        $pdf -> Cell(90,5,'(                                                       )',0,1,'R');
        $pdf -> Cell(105,2,'              (......./......./.......)',0,0,'L');
        $pdf -> Cell(90,2,'(......./......./.......)               ',0,1,'R');

        $pdf -> Ln(10);
        $pdf -> Cell(105,5,'    Receive (Reference Person)',0,0,'L');
        $pdf -> Cell(90,5,'Return (Reference Person)      ',0,1,'R');
        $pdf -> Cell(105,8,'________________________________',0,0,'L');
        $pdf -> Cell(90,8,'________________________________',0,1,'R');
        $pdf -> Cell(105,5,'(                                                       )',0,0,'L');
        $pdf -> Cell(90,5,'(                                                       )',0,1,'R');
        $pdf -> Cell(105,2,'              (......./......./.......)',0,0,'L');
        $pdf -> Cell(90,2,'(......./......./.......)               ',0,1,'R');

        $pdf -> Output('Hello.pdf', 'I');
    }
}
