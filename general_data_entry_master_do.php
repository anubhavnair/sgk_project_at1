<?php
include("./root/dbconnection.php");
$created_by = $_COOKIE["emp_id"];


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

        $qry = $db->query("UPDATE general_data_entry_master SET general_date='$date', vehical_id='$select_vehicle', noof_trips='$trips', work_descp='$work_description', opening_meter='$opening_meter', closing_meter='$closing_meter', opening_dip='$opening_dip', closing_dip='$closing_dip', total_km='$km', general_desel='$desel', general_average='$average', genral_remark='$remark', `updated_by`='$created_by', `updated_on`=NOW() WHERE id=$edit_id") or die("");






} else if (isset($_REQUEST["txt_select_vehicle"]) && isset($_REQUEST["txt_opening_meter"]) && isset($_REQUEST["txt_trips"]) && isset($_REQUEST["txt_closing_meter"]) && isset($_REQUEST["txt_km"]) && isset($_REQUEST["txt_average"]) && isset($_REQUEST["txt_work_description"]) && isset($_REQUEST["txt_enter_date"])) {

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
        $sql = "INSERT INTO general_data_entry_master (general_date, vehical_id, noof_trips, work_descp, opening_meter, closing_meter, opening_dip, closing_dip, total_km, general_desel, general_average, genral_remark,`created_on`, `updated_by`) 
        VALUES ('$date', '$select_vehicle', '$trips', '$work_description', '$opening_meter', '$closing_meter', '$opening_dip', '$closing_dip', '$km', '$desel','$average', '$remark',NOW(),'$created_by')";

        // Execute the SQL query
        $qry = $db->query($sql) or die("");
}



// deleting logic of employee master 
else if (isset($_REQUEST["del_id"])) {
        $del_id = $_REQUEST["del_id"];
        $qry = $db->query("UPDATE `general_data_entry_master` SET `updated_by`='$created_by', `updated_on`=NOW(),e_d_optn = '0' WHERE id = $del_id") or die("");


        ?>
                        <script>
                                // alert("General Data Deleted !....");
                                let message = "General Data Deleted !....";
                                let color = "red";
                                window.location.replace("./general_data_entry_master_manage.php?message=" + message + "&color=" + color);
                        </script>
        <?php
}


// Search logic 
else if (isset($_REQUEST["start_date"]) && isset($_REQUEST["end_date"]) && isset($_REQUEST["vehicle_number"]) && isset($_REQUEST["select_employee"])) {


        $start_date = $_REQUEST["start_date"];
        $end_date = $_REQUEST["end_date"];
        $vehicle_number = $_REQUEST["vehicle_number"];
        $employee = $_REQUEST["select_employee"];

        $limit = 20;

        // Update the active page number
        if (!isset($_REQUEST['page'])) {
                $page_number = 1;
                $i = 1;
        } else {
                $page_number = $_REQUEST['page'];
                $i = $limit * ($page_number - 1) + 1;
        }
        if (($_REQUEST["start_date"]) != null && ($_REQUEST["end_date"]) != null && ($_REQUEST["vehicle_number"]) != null&& ($_REQUEST["select_employee"]) != "") {
                $initial_page = ($page_number - 1) * $limit;

                // Use the BETWEEN clause to filter records between the start and end dates
                $qry = $db->query("SELECT * FROM general_data_entry_master WHERE e_d_optn = '1' && vehical_id = '$vehicle_number' && `updated_by`= $employee AND 
    STR_TO_DATE(general_date, '%Y-%m-%d') BETWEEN STR_TO_DATE('$start_date', '%Y-%m-%d') AND STR_TO_DATE('$end_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");

        }
        else if (($_REQUEST["start_date"]) != null && ($_REQUEST["end_date"]) != null && ($_REQUEST["vehicle_number"]) != null) {
                $initial_page = ($page_number - 1) * $limit;

                // Use the BETWEEN clause to filter records between the start and end dates
                $qry = $db->query("SELECT * FROM general_data_entry_master WHERE e_d_optn = '1' && vehical_id = '$vehicle_number' AND 
    STR_TO_DATE(general_date, '%Y-%m-%d') BETWEEN STR_TO_DATE('$start_date', '%Y-%m-%d') AND STR_TO_DATE('$end_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");

        }
        else if (($_REQUEST["start_date"]) != null && ($_REQUEST["end_date"]) != null && ($_REQUEST["select_employee"]) != null) {
                $initial_page = ($page_number - 1) * $limit;

                // Use the BETWEEN clause to filter records between the start and end dates
                $qry = $db->query("SELECT * FROM general_data_entry_master WHERE e_d_optn = '1' &&  `updated_by`= $employee AND 
    STR_TO_DATE(general_date, '%Y-%m-%d') BETWEEN STR_TO_DATE('$start_date', '%Y-%m-%d') AND STR_TO_DATE('$end_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");

        }
        else if (($_REQUEST["start_date"]) != null && ($_REQUEST["select_employee"]) != null && ($_REQUEST["vehicle_number"]) != null) {
                $initial_page = ($page_number - 1) * $limit;

                // Use the BETWEEN clause to filter records between the start and end dates
                $qry = $db->query("SELECT * FROM general_data_entry_master WHERE e_d_optn = '1' && `updated_by`= $employee && vehical_id = '$vehicle_number' AND 
    STR_TO_DATE(general_date, '%Y-%m-%d') >= STR_TO_DATE('$start_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");

        }
        else if (($_REQUEST["start_date"]) != null && ($_REQUEST["select_employee"]) != null && ($_REQUEST["vehicle_number"]) != null) {
                $initial_page = ($page_number - 1) * $limit;

                // Use the BETWEEN clause to filter records between the start and end dates
                $qry = $db->query("SELECT * FROM general_data_entry_master WHERE e_d_optn = '1' && `updated_by`= $employee && vehical_id = '$vehicle_number' AND 
    STR_TO_DATE(general_date, '%Y-%m-%d') >= STR_TO_DATE('$start_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");

        }
         else if (($_REQUEST["start_date"]) != null && ($_REQUEST["end_date"]) != null) {
                $initial_page = ($page_number - 1) * $limit;

                $qry = $db->query("SELECT * FROM general_data_entry_master WHERE  e_d_optn = '1' &&
      STR_TO_DATE(general_date, '%Y-%m-%d') BETWEEN STR_TO_DATE('$start_date', '%Y-%m-%d') AND STR_TO_DATE('$end_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");
        }
        else if (($_REQUEST["select_employee"]) != null && ($_REQUEST["vehicle_number"]) != null) {
                $initial_page = ($page_number - 1) * $limit;

                $qry = $db->query("SELECT * FROM general_data_entry_master WHERE  e_d_optn = '1' && `updated_by`= $employee && vehical_id = '$vehicle_number' LIMIT $initial_page , $limit")
                        or die("");
        } 
        else if (($_REQUEST["end_date"]) != null && ($_REQUEST["select_employee"]) != null) {
                $initial_page = ($page_number - 1) * $limit;

                $qry = $db->query("SELECT * FROM general_data_entry_master WHERE e_d_optn = '1' &&  `updated_by`= $employee AND 
      STR_TO_DATE(general_date, '%Y-%m-%d') <= STR_TO_DATE('$end_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");
        } 
         else if (($_REQUEST["end_date"]) != null && ($_REQUEST["vehicle_number"]) != null) {
                $initial_page = ($page_number - 1) * $limit;

                $qry = $db->query("SELECT * FROM general_data_entry_master WHERE e_d_optn = '1' && vehical_id = '$vehicle_number' AND 
      STR_TO_DATE(general_date, '%Y-%m-%d') <= STR_TO_DATE('$end_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");
        } 
        else if (($_REQUEST["start_date"]) != null && ($_REQUEST["select_employee"]) != null) {
                $initial_page = ($page_number - 1) * $limit;

                $qry = $db->query("SELECT * FROM general_data_entry_master WHERE e_d_optn = '1' &&  `updated_by`= $employee AND 
      STR_TO_DATE(general_date, '%Y-%m-%d') >= STR_TO_DATE('$start_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");
        }
        else if (($_REQUEST["start_date"]) != null && ($_REQUEST["vehicle_number"]) != null) {
                $initial_page = ($page_number - 1) * $limit;

                $qry = $db->query("SELECT * FROM general_data_entry_master WHERE e_d_optn = '1' && vehical_id = '$vehicle_number' AND 
      STR_TO_DATE(general_date, '%Y-%m-%d') >= STR_TO_DATE('$start_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");
        } else if (($_REQUEST["start_date"]) != null) {
                $initial_page = ($page_number - 1) * $limit;

                $qry = $db->query("SELECT * FROM general_data_entry_master WHERE e_d_optn = '1' &&
      STR_TO_DATE(general_date, '%Y-%m-%d') >= STR_TO_DATE('$start_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");
        } else if (($_REQUEST["end_date"]) != null) {
                $initial_page = ($page_number - 1) * $limit;

                $qry = $db->query("SELECT * FROM general_data_entry_master WHERE e_d_optn = '1' &&
      STR_TO_DATE(general_date, '%Y-%m-%d') <= STR_TO_DATE('$end_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");
        } else if (($_REQUEST["vehicle_number"]) != null) {
                $initial_page = ($page_number - 1) * $limit;
                $qry = $db->query("SELECT * FROM general_data_entry_master WHERE e_d_optn = '1' && vehical_id = '$vehicle_number' LIMIT $initial_page , $limit")
                        or die("");
        } else if (($_REQUEST["select_employee"]) != null) {
                $initial_page = ($page_number - 1) * $limit;
                $qry = $db->query("SELECT * FROM general_data_entry_master WHERE e_d_optn = '1' && `updated_by`= $employee LIMIT $initial_page , $limit")
                        or die("");
        }



        ?>
                <?php

                while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
                        $id = $row['id'];
                        $vehicle_id = $row['vehical_id'];
                        $query = $db->query("SELECT * FROM `vehicle_master` WHERE id='$vehicle_id'");
                        $rowVehicle = $query->fetch(PDO::FETCH_ASSOC);
                        $vehicle_name = $rowVehicle['vehical_name'];

                        ?>

                                        <tr>
                                                <th scope="row">
                                <?php echo $i; ?>
                                                </th>
                                                <td>
                                <?= $row['general_date'] ?>
                                                </td>
                                                <td>
                                <?= $vehicle_name ?>
                                                </td>
                                                <td>
                                <?= $row['noof_trips'] ?>
                                                </td>
                                                <td>
                                <?= $row['work_descp'] ?>
                                                </td>
                                                <td>
                                <?= $row['opening_meter'] ?>
                                                </td>
                                                <td>
                                <?= $row['opening_dip'] ?>
                                                </td>
                                                <td>
                                <?= $row['closing_meter'] ?>
                                                </td>
                                                <td>
                                <?= $row['closing_dip'] ?>
                                                </td>
                                                <td>
                                <?= $row['total_km'] ?>
                                                </td>
                                                <td>
                                <?= $row['general_desel'] ?>
                                                </td>
                                                <td>
                                <?= $row['general_average'] ?>
                                                </td>
                                                <td>
                                <?= $row['genral_remark'] ?>
                                                </td>

                                                <td>
                                                        <div class="d-flex justify-content-center align-items-center"><a
                                                                        href="general_data_entry_master_do.php?del_id=<?= $id ?>"><svg
                                                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"
                                                                                class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                                                <path
                                                                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                                        </svg></a> &nbsp;&nbsp;<a href="general_data_entry_master.php?edit_id=<?= $id ?>"><svg
                                                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue"
                                                                                class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                                                <path
                                                                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                                                        </svg></a>
                                                        </div>
                                                </td>

                                        </tr>
                        <?php
                        $i++;
                }
                ?>
                                <input type="hidden" id="page_number" name="page_number" value="<?= $page_number ?>">

        <?php
} else if (isset($_REQUEST['preview'])) {
        ?>
                                        <table class="table">
                                                <thead>
                                                        <tr>
                                                                <th scope="col">S.no</th>
                                                                <th scope="col">Date</th>
                                                                <th scope="col">Vehicle</th>
                                                                <th scope="col">No. of Trips</th>
                                                                <th scope="col">Work Description</th>
                                                                <th scope="col">Opening Meter</th>
                                                                <th scope="col">Opening Dip</th>
                                                                <th scope="col">Closing Meter</th>
                                                                <th scope="col">Closing Dip</th>
                                                                <th scope="col">K.M.</th>
                                                                <th scope="col">Desel</th>
                                                                <th scope="col">Average</th>
                                                                <th scope="col">Remark</th>
                                                        </tr>
                                                </thead>
                                                <tbody id="details_table_body">
                                <?php

                                $qry = $db->query("SELECT * FROM `general_data_entry_master` WHERE e_d_optn = '1' ORDER BY STR_TO_DATE(general_date, '%Y-%m-%d') DESC LIMIT 0,14") or die("");


                                $i = 2;
                                while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
                                        $id = $row['id'];
                                        $vehicle_id = $row['vehical_id'];
                                        $query = $db->query("SELECT * FROM `vehicle_master` WHERE id='$vehicle_id'");
                                        $rowVehicle = $query->fetch(PDO::FETCH_ASSOC);
                                        $vehicle_name = $rowVehicle['vehical_name'];

                                        ?>

                                                                <tr>
                                                                        <th scope="row">
                                                <?php echo $i; ?>
                                                                        </th>
                                                                        <td>
                                                <?= $row['general_date'] ?>
                                                                        </td>
                                                                        <td>
                                                <?= $vehicle_name ?>
                                                                        </td>
                                                                        <td>
                                                <?= $row['noof_trips'] ?>
                                                                        </td>
                                                                        <td>
                                                <?= $row['work_descp'] ?>
                                                                        </td>
                                                                        <td>
                                                <?= $row['opening_meter'] ?>
                                                                        </td>
                                                                        <td>
                                                <?= $row['opening_dip'] ?>
                                                                        </td>
                                                                        <td>
                                                <?= $row['closing_meter'] ?>
                                                                        </td>
                                                                        <td>
                                                <?= $row['closing_dip'] ?>
                                                                        </td>
                                                                        <td>
                                                <?= $row['total_km'] ?>
                                                                        </td>
                                                                        <td>
                                                <?= $row['general_desel'] ?>
                                                                        </td>
                                                                        <td>
                                                <?= $row['general_average'] ?>
                                                                        </td>
                                                                        <td>
                                                <?= $row['genral_remark'] ?>
                                                                        </td>



                                                                </tr>
                                        <?php
                                        $i++;
                                }
                                ?>

                                                </tbody>
                                        </table>
        <?php
}
?>