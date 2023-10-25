<?php
include("./root/dbconnection.php");


// tank entry  insert and update logic here if isset($_REQUEST["edit_id"]) then it will perform update query elseif perform insert querry 
if (isset($_REQUEST["edit_id"])) {

    $edit_id = $_REQUEST["edit_id"];
    $date = $_REQUEST["txt_enter_date"];
    $select_vehicle = $_REQUEST["txt_select_vehicle"];
    $opening_meter = $_REQUEST["txt_opening_meter"];
    $trips = $_REQUEST["txt_trips"];
    $closing_meter = $_REQUEST["txt_closing_meter"];
    $km = $_REQUEST["txt_km"];
    $description = $_REQUEST["txt_work_description"];
    $dip = $_REQUEST["txt_desel"];
    $average = $_REQUEST["txt_average"];

    $qry = $db->query("UPDATE `tank_entry_master` SET `tank_entry_date`='$date',`area_id`='$select_vehicle',`opening_meter`='$opening_meter ',`total_refil`='$trips',`closing_meter`='$closing_meter',`diesel_out`='$km',`tankentry_description`=' $description',`tank_dip`='$dip',`tank_balance`='$average' WHERE id= $edit_id ") or die("");




}
 else if (isset($_REQUEST["txt_select_vehicle"]) && isset($_REQUEST["txt_opening_meter"]) && isset($_REQUEST["txt_trips"]) && isset($_REQUEST["txt_closing_meter"])&& isset($_REQUEST["txt_km"])&& isset($_REQUEST["txt_average"])&& isset($_REQUEST["txt_work_description"])&& isset($_REQUEST["txt_enter_date"])) {

    $date = $_REQUEST["txt_enter_date"];
    $select_vehicle = $_REQUEST["txt_select_vehicle"];
    $trips = $_REQUEST["txt_trips"];
    $work_description = $_REQUEST["txt_work_description"];
    $opening_meter = $_REQUEST["txt_opening_meter"];
    $opening_dip = $_REQUEST["txt_opening_dip"];
    $closing_meter = $_REQUEST["txt_closing_meter"];
    $closing_dip = $_REQUEST["txt_closing_dip"];
    $km = $_REQUEST["txt_km"];
    $desel = $_REQUEST["txt_desel"];
    $average = $_REQUEST["txt_average"];
    $remark = $_REQUEST["txt_remark"];

    $qry = $db->query("INSERT INTO `general_data_entry_master`(`general_date`, `vehical_id`, `noof_trips`, `work_descp`, `opening_meter`, `closing_meter`, `opening_dip`, `closing_dip`, `total_km`, `genral_remark`, `created_on`, `updated_by`, `updated_on`, `e_d_optn`) VALUES ('$date','$select_vehicle',' $trips',' $work_description','$opening_meter','$closing_meter','$opening_dip',' $closing_dip','$km','$remark')") or die("");
}



// deleting logic of employee master 

else if (isset($_REQUEST["del_id"])) {
    $del_id = $_REQUEST["del_id"];
    $qry = $db->query("DELETE FROM `tank_entry_master` WHERE id = $del_id") or die("");


    ?>
    <script>
        alert("Tank data Deleted !....");
        window.location.replace("./tank_master_manage.php");
    </script>
    <?php
}
?>