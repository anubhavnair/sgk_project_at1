<?php
include("./root/dbconnection.php");


// employee  insert and update logic here if isset($_REQUEST["edit_id"]) then it will perform update query elseif perform insert querry 
if (isset($_REQUEST["edit_id"])) {

    $edit_id = $_REQUEST["edit_id"];
    $emp_name = $_REQUEST["text_employee_name"];
    $emp_mobile = $_REQUEST["text_employee_mobile_number"];
    $emp_pass = $_REQUEST["text_employee_password"];

    $qry = $db->query("UPDATE `employee_master` SET `emp_name`='$emp_name',`emp_mono`='$emp_mobile',`emp_password`='$emp_pass' WHERE id = $edit_id ") or die("");




}
 else if (isset($_REQUEST["txt_vehical_name"]) && isset($_REQUEST["txt_driver_name"]) && isset($_REQUEST["txt_vehical_number"]) && isset($_REQUEST["txt_driver_number"])) {

    $vehicle_name = $_REQUEST["text_vehical_name"];
    $driver_name = $_REQUEST["txt_driver_name"];
    $vehical_number = $_REQUEST["txt_vehical_number"];
    $driver_number = $_REQUEST["txt_driver_number"];

    $qry = $db->query("INSERT INTO `vehical_master`(`vehical_name`,`vehicle_number`, `driver_name`, `driver_contactno`) VALUES ('$vehicle_name','$vehical_number','$driver_name','$driver_number'") or die("");
}



// deleting logic of employee master 

if (isset($_REQUEST["del_id"])) {
    $del_id = $_REQUEST["del_id"];
    $qry = $db->query("DELETE FROM `employee_master` WHERE id = $del_id") or die("");


    ?>
    <script>
        alert("Employee Data Deleted !....");
        window.location.replace("./employee_master_manage.php");
    </script>
    <?php
}
?>