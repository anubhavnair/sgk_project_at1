<?php
include("./root/dbconnection.php");


// insert logic of module master 
if (isset($_REQUEST["text_module_title"]) && isset($_REQUEST["text_short_order"]) && isset($_REQUEST["text_url"]) && !isset($_REQUEST["edit_id"])) {

    $text_module_title = $_REQUEST["text_module_title"];
    $text_short_order = $_REQUEST["text_short_order"];
    $text_url = $_REQUEST["text_url"];

    // inserting into module_master table 
    $qry = $db->query("INSERT INTO `module_master`(`module_title`, `short_order`, `module_url`) VALUES ('$text_module_title','$text_short_order','$text_url')") or die("");
}



// deleting logic of module master 

if (isset($_REQUEST["del_id"])) {
    $del_id = $_REQUEST["del_id"];
    $qry = $db->query("DELETE FROM `module_master` WHERE id = $del_id") or die("");


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
    $edit_id = $_REQUEST["edit_id"];
    $text_module_title = $_REQUEST["text_module_title"];
    $text_short_order = $_REQUEST["text_short_order"];
    $text_url = $_REQUEST["text_url"];

    $qry = $db->query("UPDATE `module_master` SET `module_title`='$text_module_title',`short_order`='$text_short_order',`module_url`='$text_url' WHERE id = $edit_id") or die("");
}
?>