<?php
include("./root/dbconnection.php");


// manager entry master  insert and update logic here if isset($_REQUEST["edit_id"]) then it will perform update query elseif perform insert querry 
if (isset($_REQUEST["edit_id"])) {

    $edit_id = $_REQUEST["edit_id"];
    $dt_date = $_REQUEST["dt_date"];
    $slip_number = $_REQUEST["text_slip_number"];
    $vehical_number = $_REQUEST["text_vehical_number"];
    $qty = $_REQUEST["text_quantity"];

    $qry = $db->query("UPDATE `manager_entry_master` SET `select_date`='$dt_date',`slip_no`='$slip_number',`vehical_no`='$vehical_number',`total_qty`='$qty' WHERE id = $edit_id") or die("");




} elseif (isset($_REQUEST["dt_date"]) && isset($_REQUEST["text_slip_number"]) && isset($_REQUEST["text_vehical_number"]) && isset($_REQUEST["text_quantity"])) {

    $dt_date = $_REQUEST["dt_date"];
    $slip_number = $_REQUEST["text_slip_number"];
    $vehical_number = $_REQUEST["text_vehical_number"];
    $qty = $_REQUEST["text_quantity"];

    $qry = $db->query("INSERT INTO `manager_entry_master`(`select_date`, `slip_no`, `vehical_no`, `total_qty`) VALUES ('$dt_date','$slip_number','$vehical_number','$qty')") or die("");

}



// deleting logic of employee master 

if (isset($_REQUEST["del_id"])) {
    $del_id = $_REQUEST["del_id"];
    $qry = $db->query("DELETE FROM `manager_entry_master` WHERE id = $del_id") or die("");


    ?>
    <script>
        alert("Data Deleted !....");
        window.location.replace("./manager_entry_master_manage.php");
    </script>
    <?php
}
?>