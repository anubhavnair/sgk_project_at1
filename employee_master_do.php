<?php
include("./root/dbconnection.php");


// employee  insert and update logic here if isset($_REQUEST["edit_id"]) then it will perform update query elseif perform insert querry 
if (isset($_REQUEST["edit_id"])) {
    $updated_by = $_COOKIE["emp_id"];
    $edit_id = $_REQUEST["edit_id"];
    $emp_name = $_REQUEST["text_employee_name"];
    $emp_mobile = $_REQUEST["text_employee_mobile_number"];
    $emp_pass = $_REQUEST["text_employee_password"];

    $qry = $db->query("UPDATE `employee_master` SET `emp_name`='$emp_name',`updated_by`= $updated_by,`updated_on`=NOW(),`emp_mono`='$emp_mobile',`emp_password`='$emp_pass' WHERE id = $edit_id ") or die("");




} elseif (isset($_REQUEST["text_employee_name"]) && isset($_REQUEST["text_employee_mobile_number"]) && isset($_REQUEST["text_employee_password"])) {
    $created_by = $_COOKIE["emp_id"];
    $emp_name = $_REQUEST["text_employee_name"];
    $emp_mobile = $_REQUEST["text_employee_mobile_number"];
    $emp_pass = $_REQUEST["text_employee_password"];

    $qry = $db->query("INSERT INTO `employee_master`(`emp_name`, `emp_mono`, `emp_password`,`created_by`,`created_on`) VALUES ('$emp_name','$emp_mobile','$emp_pass','$created_by',NOW())") or die("");

}



// deleting logic of employee master 

if (isset($_REQUEST["del_id"])) {
    $updated_by = $_COOKIE["emp_id"];
    $del_id = $_REQUEST["del_id"];
    $qry = $db->query("UPDATE `employee_master` SET e_d_optn = 0 ,`updated_by`= $updated_by,`updated_on`=NOW() WHERE id = $del_id") or die("");


    ?>
    <script>

        window.location.replace("./employee_master_manage.php?res=3");
    </script>
    <?php
}
?>