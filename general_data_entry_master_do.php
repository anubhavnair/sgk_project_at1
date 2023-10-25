<?php
include("./root/dbconnection.php");


// tank entry  insert and update logic here if isset($_REQUEST["edit_id"]) then it will perform update query elseif perform insert querry 
if (isset($_REQUEST["edit_id"])) {

    $edit_id = $_REQUEST["edit_id"];
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
    
    $qry = $db->query("UPDATE general_data_entry_master SET general_date='$date', vehical_id='$select_vehicle', noof_trips='$trips', work_descp='$work_description', opening_meter='$opening_meter', closing_meter='$closing_meter', opening_dip='$opening_dip', closing_dip='$closing_dip', total_km='$km', general_desel='$desel', general_average='$average', genral_remark='$remark' WHERE id=$edit_id") or die("cannot update");
    





} 
else if (isset($_REQUEST["txt_select_vehicle"]) && isset($_REQUEST["txt_opening_meter"]) && isset($_REQUEST["txt_trips"]) && isset($_REQUEST["txt_closing_meter"]) && isset($_REQUEST["txt_km"]) && isset($_REQUEST["txt_average"]) && isset($_REQUEST["txt_work_description"]) && isset($_REQUEST["txt_enter_date"])) {

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

    // SQL query to insert data
    $sql = "INSERT INTO general_data_entry_master (general_date, vehical_id, noof_trips, work_descp, opening_meter, closing_meter, opening_dip, closing_dip, total_km, general_desel, general_average, genral_remark) 
        VALUES ('$date', '$select_vehicle', '$trips', '$work_description', '$opening_meter', '$closing_meter', '$opening_dip', '$closing_dip', '$km', '$desel','$average', '$remark')";

    // Execute the SQL query
    $qry = $db->query($sql) or die("");
}



// deleting logic of employee master 
else if (isset($_REQUEST["del_id"])) {
    $del_id = $_REQUEST["del_id"];
    $qry = $db->query("DELETE FROM `general_data_entry_master` WHERE id = $del_id") or die("");


    ?>
            <script>
                alert("General Data Deleted !....");
                window.location.replace("./general_data_entry_master_manage.php");
            </script>
    <?php
}
?>