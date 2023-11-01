<?php
include("./root/dbconnection.php");


// insert logic of module master 
if (isset($_REQUEST["text_module_title"]) && isset($_REQUEST["text_short_order"]) && isset($_REQUEST["text_url"]) && !isset($_REQUEST["edit_id"])) {
    $created_by = $_COOKIE["emp_id"];
    $text_module_title = $_REQUEST["text_module_title"];
    $text_short_order = $_REQUEST["text_short_order"];
    $text_url = $_REQUEST["text_url"];

    // inserting into module_master table 
    $qry = $db->query("INSERT INTO `module_master` (`module_title`, `short_order`, `module_url`, `created_by`, `created_on`) VALUES ('$text_module_title', '$text_short_order', '$text_url', '$created_by', NOW())") or die("");

}



// deleting logic of module master 

if (isset($_REQUEST["del_id"])) {
    $updated_by = $_COOKIE["emp_id"];
    $del_id = $_REQUEST["del_id"];
    $qry = $db->query("UPDATE `module_master` SET e_d_optn = 0, `updated_by` = '$updated_by',`updated_on`= NOW() WHERE id = $del_id") or die("");


    ?>
    <script>

        window.location.replace("./module_master_manage.php?res=3");
    </script>
    <?php
}
?>

<?php


// updating logic here  

if (isset($_REQUEST["text_module_title"]) && isset($_REQUEST["text_short_order"]) && isset($_REQUEST["text_url"]) && isset($_REQUEST["edit_id"])) {

    include("./root/dbconnection.php");
    $updated_by = $_COOKIE["emp_id"];
    $edit_id = $_REQUEST["edit_id"];
    $text_module_title = $_REQUEST["text_module_title"];
    $text_short_order = $_REQUEST["text_short_order"];
    $text_url = $_REQUEST["text_url"];

    $qry = $db->query("UPDATE `module_master` SET `module_title`='$text_module_title',`short_order`='$text_short_order',`module_url`='$text_url',`updated_by` = '$updated_by',`updated_on`= NOW() WHERE id = $edit_id") or die("");
}
?>