<?php
include("./root/dbconnection.php");

if (isset($_REQUEST["mobile_number"]) && isset($_REQUEST["password"])) {
    $mobile_no = $_REQUEST["mobile_number"];
    $pass = $_REQUEST["password"];



    $qry = $db->query("select * from employee_master where emp_mono = '$mobile_no'") or die("");
    $row = $qry->fetch(PDO::FETCH_ASSOC);
    if ($qry->rowCount() == 0) {
        echo 1;
    } else {
        if ($row["emp_password"] != $pass) {
            echo 2;
        } else {

            echo 3;
            setcookie("emp_id", $row["id"], time() + 24 * 60 * 60);
            setcookie("emp_name", $row["emp_name"], time() + 24 * 60 * 60);
            setcookie("emp_mobile", $row["emp_mono"], time() + 24 * 60 * 60);
        }


    }

}

?>