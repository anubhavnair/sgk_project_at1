<?php
include("./root/dbconnection.php");


// employee  insert and update logic here if isset($_REQUEST["edit_id"]) then it will perform update query elseif perform insert querry 
if (isset($_REQUEST["edit_id"])) {
    $updated_by = $_COOKIE["emp_id"];
    $edit_id = $_REQUEST["edit_id"];
    $area_name = $_REQUEST["text_area_name"];


    $qry = $db->query("UPDATE `area_master` SET `area_name` ='$area_name',`updated_by`='$updated_by' ,`updated_on`= NOW() WHERE id = $edit_id ") or die("");




} elseif (isset($_REQUEST["text_area_name"])) {
    $created_by = $_COOKIE["emp_id"];
    $area_name = $_REQUEST["text_area_name"];

    $qry = $db->query("INSERT INTO `area_master`(`area_name`,`created_by`,`created_on`) VALUES ('$area_name','$created_by', NOW())") or die("");




}



// deleting logic of employee master 

if (isset($_REQUEST["del_id"])) {
    $updated_by = $_COOKIE["emp_id"];
    $del_id = $_REQUEST["del_id"];
    $qry = $db->query("UPDATE `area_master` SET e_d_optn = 0 ,updated_by = $updated_by, updated_on = NOW() WHERE id = $del_id") or die("");


    ?>
    <script>

        window.location.replace("./area_master_manage.php?res=3");
    </script>
    <?php
}
?>