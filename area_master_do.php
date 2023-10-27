<?php
include("./root/dbconnection.php");


// employee  insert and update logic here if isset($_REQUEST["edit_id"]) then it will perform update query elseif perform insert querry 
if (isset($_REQUEST["edit_id"])) {

    $edit_id = $_REQUEST["edit_id"];
    $area_name = $_REQUEST["text_area_name"];


    $qry = $db->query("UPDATE `area_master` SET `area_name`  ='$area_name' WHERE id = $edit_id ") or die("");




} elseif (isset($_REQUEST["text_area_name"])) {

    $area_name = $_REQUEST["text_area_name"];

    $qry = $db->query("INSERT INTO `area_master`(`area_name`) VALUES ('$area_name')") or die("");




}



// deleting logic of employee master 

if (isset($_REQUEST["del_id"])) {
    $del_id = $_REQUEST["del_id"];
    $qry = $db->query("DELETE FROM `area_master` WHERE id = $del_id") or die("");


    ?>
    <script>

        window.location.replace("./area_master_manage.php?res=3");
    </script>
    <?php
}
?>