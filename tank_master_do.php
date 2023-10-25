<?php
include("./root/dbconnection.php");


// tank entry  insert and update logic here if isset($_REQUEST["edit_id"]) then it will perform update query elseif perform insert querry 
if (isset($_REQUEST["edit_id"])) {

    $edit_id = $_REQUEST["edit_id"];
    $date = $_REQUEST["txt_enter_date"];
    $select_area = $_REQUEST["txt_select_area"];
    $opening_meter = $_REQUEST["txt_opening_meter"];
    $total_refill = $_REQUEST["txt_total_refill"];
    $closing_meter = $_REQUEST["txt_closing_meter"];
    $desel_out = $_REQUEST["txt_desel_out"];
    $description = $_REQUEST["txt_description"];
    $dip = $_REQUEST["txt_dip"];
    $banance = $_REQUEST["txt_banance"];

    $qry = $db->query("UPDATE `tank_entry_master` SET `tank_entry_date`='$date',`area_id`='$select_area',`opening_meter`='$opening_meter ',`total_refil`='$total_refill',`closing_meter`='$closing_meter',`diesel_out`='$desel_out',`tankentry_description`=' $description',`tank_dip`='$dip',`tank_balance`='$banance' WHERE id= $edit_id ") or die("");




}
 else if (isset($_REQUEST["txt_select_area"]) && isset($_REQUEST["txt_opening_meter"]) && isset($_REQUEST["txt_total_refill"]) && isset($_REQUEST["txt_closing_meter"])&& isset($_REQUEST["txt_desel_out"])&& isset($_REQUEST["txt_banance"])&& isset($_REQUEST["txt_description"])&& isset($_REQUEST["txt_enter_date"])) {

    $date = $_REQUEST["txt_enter_date"];
    $select_area = $_REQUEST["txt_select_area"];
    $opening_meter = $_REQUEST["txt_opening_meter"];
    $total_refill = $_REQUEST["txt_total_refill"];
    $closing_meter = $_REQUEST["txt_closing_meter"];
    $desel_out = $_REQUEST["txt_desel_out"];
    $description = $_REQUEST["txt_description"];
    $dip = $_REQUEST["txt_dip"];
    $banance = $_REQUEST["txt_banance"];

    $qry = $db->query("INSERT INTO `tank_entry_master`(`tank_entry_date`, `area_id`, `opening_meter`, `total_refil`, `closing_meter`, `diesel_out`, `tankentry_description`, `tank_dip`, `tank_balance`) VALUES ('$date','$select_area','$opening_meter','$total_refill','$closing_meter','$desel_out','$description','$dip','$banance')") or die("");
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