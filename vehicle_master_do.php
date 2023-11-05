<?php
include("./root/dbconnection.php");


// employee  insert and update logic here if isset($_REQUEST["edit_id"]) then it will perform update query elseif perform insert querry 
if (isset($_REQUEST["edit_id"])) {

    $edit_id=$_REQUEST['edit_id'];
    $vehicle_name = $_REQUEST["txt_vehical_name"];
    $driver_name = $_REQUEST["txt_driver_name"];
    $vehical_number = $_REQUEST["txt_vehical_number"];
    $driver_number = $_REQUEST["txt_driver_number"];
    $created_by = $_COOKIE["emp_id"];

    $qry = $db->query("UPDATE  `vehicle_master` SET `vehical_name`='$vehicle_name',`vehicle_number`='$vehical_number',`driver_name`='$driver_name',`driver_contactno`=$driver_number,`updated_by`='$created_by',`updated_on`=NOW() WHERE id = $edit_id ") or die("");




} 
else if (isset($_REQUEST["txt_vehical_name"]) && isset($_REQUEST["txt_driver_name"]) && isset($_REQUEST["txt_vehical_number"]) && isset($_REQUEST["txt_driver_number"])) {
    $vehicle_name = $_REQUEST["txt_vehical_name"];
    $driver_name = $_REQUEST["txt_driver_name"];
    $vehical_number = $_REQUEST["txt_vehical_number"];
    $driver_number = $_REQUEST["txt_driver_number"];
    $created_by = $_COOKIE["emp_id"];

    // SQL query to insert data
    $sql = "INSERT INTO `vehicle_master` (`vehical_name`, `vehicle_number`, `driver_name`, `driver_contactno`,`created_on`, `updated_by`) VALUES ('$vehicle_name', '$vehical_number', '$driver_name', '$driver_number',NOW(),'$created_by')";

    // Execute the SQL query
    $qry = $db->query($sql) or die("");

   
}




// deleting logic of employee master 

if (isset($_REQUEST["del_id"])) {
    $del_id = $_REQUEST["del_id"]; 
    $created_by = $_COOKIE["emp_id"];

    $qry = $db->query("UPDATE `vehicle_master` SET `updated_by`=' $created_by',`updated_on`=NOW(),`e_d_optn`='0' WHERE id = $del_id") or die("");


    ?>
    <script>
        let message = "Vehicle Deleted Successfully";
        let color = "red";
        window.location.replace("./vehicle_master_manage.php?message="+message+"&color="+color);
    </script>
    <?php
}
?>