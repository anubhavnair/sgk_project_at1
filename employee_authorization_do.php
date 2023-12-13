<?php

include("./root/dbconnection.php");

$emp_id=str_replace("'","",$_REQUEST['emp_id']);
$auth_values_emp=str_replace("'","",$_REQUEST['auth_values_emp']);
$auth_values_area=str_replace("'","",$_REQUEST['auth_values_area']);

$updateQ=$db->query("update `employee_master` set auth_id='$auth_values_emp', emp_area_id='$auth_values_area' where id=$emp_id") or die("");
echo "success";

?>