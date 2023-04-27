<?php 

header("Content-Type:application/json");

require "../config/connection.php";

// asset report
if(isset($_POST['dept1'])) {
    $dept1 = $_POST['dept1'];

    $sql = "SELECT sum(UNIT_PRICE) as y, extract(YEAR from labelss) as x FROM (
                SELECT a.UNIT_PRICE, a.EMPL_ID, to_date(b.PO_DOCUMENT_DATE, 'DD/MM/YY') as labelss 
                FROM IT_ASSET_DETAILS1 a, IT_ASSET_HEADER1 b
                WHERE a.unit_price >= 5000
                AND a.PO_NUMBER = b.PO_NUMBER
                AND a.EMPL_ID = :emp_id
            )
            GROUP BY extract(YEAR from labelss)
            ORDER BY extract(YEAR from labelss) ASC";

    $result = oci_parse(connection(), $sql);
    oci_bind_by_name($result, ':emp_id', $dept1);
    oci_execute($result);

    $data = array();
    while($details = oci_fetch_assoc($result)) {
        $empId = $details["EMPL_ID"];

        $dept_code = "SELECT DISTINCT B.DEPTID, B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, JOBCUR_EE C 
            WHERE B.DEPTID = C.DEPTID
            AND A.EMPLID = C.EMPLID
            AND A.EMPLID = :empl";
        $stmt = oci_parse(connection1(), $dept_code);
        oci_bind_by_name($stmt, ':empl', $empId);
        oci_execute($stmt);

        $data[] = array("label"=>$details["X"], "y"=>$details["Y"]);
    }
    echo json_encode($data, JSON_NUMERIC_CHECK);
}

// expense chart
if(isset($_POST['dept2'])) {
    $dept2 = $_POST['dept2'];

    $sql = "SELECT sum(UNIT_PRICE) as y, extract(YEAR from labelss) as x FROM (
                SELECT a.UNIT_PRICE, to_date(b.PO_DOCUMENT_DATE, 'DD/MM/YY') as labelss 
                FROM IT_ASSET_DETAILS1 a, IT_ASSET_HEADER1 b
                WHERE a.unit_price < 5000
                AND a.PO_NUMBER = b.PO_NUMBER
                AND a.EMPL_ID = :emp_id
            )
            GROUP BY extract(YEAR from labelss)
            ORDER BY extract(YEAR from labelss) ASC";

    $result = oci_parse(connection(), $sql);
    oci_bind_by_name($result, ':emp_id', $dept2);
    oci_execute($result);

    $data = array();
    while($details = oci_fetch_assoc($result)) {
        $empId = "EMPL_ID";

        $dept_code = "SELECT DISTINCT B.DESCR FROM PERSON_TBL A, DEPARTMENT_TBL B, JOBCUR_EE C 
                      WHERE B.DEPTID = C.DEPTID
                      AND A.EMPLID = C.EMPLID
                      AND A.EMPLID = :empl";
        $stmt = oci_parse(connection1(), $dept_code);
        oci_bind_by_name($stmt, ':empl', $empId);
        oci_execute($stmt);

        $data[] = array("label"=>$details["X"], "y"=>$details["Y"]);
    }
    echo json_encode($data, JSON_NUMERIC_CHECK);
}
?>