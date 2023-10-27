<?php
include("./root/dbconnection.php");


// employee  insert and update logic here if isset($_REQUEST["edit_id"]) then it will perform update query elseif perform insert querry 
if (isset($_REQUEST["edit_id"])) {

    $edit_id = $_REQUEST["edit_id"];
    $emp_name = $_REQUEST["text_employee_name"];
    $emp_mobile = $_REQUEST["text_employee_mobile_number"];
    $emp_pass = $_REQUEST["text_employee_password"];

    $qry = $db->query("UPDATE `employee_master` SET `emp_name`='$emp_name',`emp_mono`='$emp_mobile',`emp_password`='$emp_pass' WHERE id = $edit_id ") or die("");




} elseif (isset($_REQUEST["text_employee_name"]) && isset($_REQUEST["text_employee_mobile_number"]) && isset($_REQUEST["text_employee_password"])) {

    $emp_name = $_REQUEST["text_employee_name"];
    $emp_mobile = $_REQUEST["text_employee_mobile_number"];
    $emp_pass = $_REQUEST["text_employee_password"];

    $qry = $db->query("INSERT INTO `employee_master`(`emp_name`, `emp_mono`, `emp_password`) VALUES ('$emp_name','$emp_mobile','$emp_pass')") or die("");

}



// deleting logic of employee master 

if (isset($_REQUEST["del_id"])) {
    $del_id = $_REQUEST["del_id"];
    $qry = $db->query("DELETE FROM `employee_master` WHERE id = $del_id") or die("");


    ?>
    <script>

        window.location.replace("./employee_master_manage.php?res=3");
    </script>
    <?php
}
?>