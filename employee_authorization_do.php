<?php

include("./root/dbconnection.php");
if (isset($_REQUEST["emp_id"]) && isset($_REQUEST["module_ids"])) {
    $emp_id = $_REQUEST["emp_id"];
    $module_ids = $_REQUEST["module_ids"];
    $qry = $db->query("UPDATE `employee_master` SET `auth_id`='$module_ids' WHERE id = $emp_id ") or die("");

}


// getting the data which module is asign to which employee 

if (isset($_REQUEST["selected_emp_id"])) {
    $id = $_REQUEST["selected_emp_id"];
    $qry_emp = $db->query("select auth_id from employee_master where id = $id") or die("");
    $row_emp = $qry_emp->fetch(PDO::FETCH_ASSOC);

    $auth_id = $row_emp["auth_id"];
    $auth_id_arr = explode(",", $auth_id);

    $qry_module = $db->query("select * from module_master ") or die("");
    ?>

    <label>Select Module</label>
    <?php

    while ($module = $qry_module->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <li class="lh-lg">
            <input class="form-check-input checkbox mr-1.8" type="checkbox" value="<?php echo $module['id']; ?>"
                name="select_module" <?php
                if (in_array($module['id'], $auth_id_arr)) {
                    echo "checked";
                }

                ?>>
            <span class="ml-2">
                <?php echo $module['module_title']; ?>
            </span>
        </li>


        <?php

    }

?>
<?php
}

?>