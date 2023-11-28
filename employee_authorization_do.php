<?php

include("./root/dbconnection.php");
if (isset($_REQUEST["emp_id"]) && isset($_REQUEST["module_ids"])) {
    $emp_id = $_REQUEST["emp_id"];
    $module_ids = $_REQUEST["module_ids"];
    $area_ids = $_REQUEST["area_ids"];
    if ($area_ids != "") {

        $qry = $db->query("UPDATE `employee_master` SET `auth_id`='$module_ids',`emp_area_id`= '$area_ids' WHERE id = $emp_id ") or die("");
    }
    else
    {
        $qry = $db->query("UPDATE `employee_master` SET `auth_id`='$module_ids' WHERE id = $emp_id ") or die("");
    }
}


// getting the data which module is asign to which employee 

if (isset($_REQUEST["selected_emp_id"])) {
    $id = $_REQUEST["selected_emp_id"];
    $qry_emp = $db->query("select auth_id,emp_area_id,emp_login_type from employee_master where id = $id") or die("");
    $row_emp = $qry_emp->fetch(PDO::FETCH_ASSOC);

    $auth_id = $row_emp["auth_id"];
    $auth_id_arr = explode(",", $auth_id);

    $area_id = $row_emp["emp_area_id"];
    $area_id_arr = explode(",", $area_id);

    $emp_login_type = $row_emp["emp_login_type"];

    $qry_module = $db->query("select * from module_master ") or die("");
    $qry_area = $db->query("select * from area_master WHERE e_d_optn = 1") or die("");

    ?>

    <label>Select Module</label>
    <ul>
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
    </ul>
    <?php
    if ($emp_login_type == 0) {
        ?>
        <br>
        <ul class="text-left">

            <label>Select Area</label>
            <?php

            while ($area = $qry_area->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <li class="lh-lg">
                    <input class="form-check-input checkbox mr-1.8" type="checkbox" value="<?php echo $area['id']; ?>"
                        name="select_area" <?php
                        if (in_array($area['id'], $area_id_arr)) {
                            echo "checked";
                        }

                        ?>>
                    <span class="ml-2">
                        <?php echo $area['area_name']; ?>
                    </span>
                </li>


                <?php

            }

            ?>

        </ul>
        <?php
    }
}

?>