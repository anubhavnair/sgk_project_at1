<?php
include("./root/dbconnection.php");
$created_by = $_COOKIE["emp_id"];


// tank entry  insert and update logic here if isset($_REQUEST["edit_id"]) then it will perform update query elseif perform insert querry 
if (isset($_REQUEST["edit_id"])) {


        $edit_id = $_REQUEST["edit_id"];
        $date = $_REQUEST["date_enter_date"];
        $select_area = $_REQUEST["txt_select_area"];
        $opening_meter = $_REQUEST["txt_opening_meter"];
        $total_refill = $_REQUEST["txt_total_refill"];
        $closing_meter = $_REQUEST["txt_closing_meter"];
        $desel_out = $_REQUEST["txt_desel_out"];
        $description_dip_info = $_REQUEST["description_dip_info"];
        $balance = $_REQUEST["txt_balance"];

        $qry = $db->query("UPDATE `tank_entry_master` SET `tank_entry_date`='$date',`area_id`='$select_area',`opening_meter`='$opening_meter',`total_refil`='$total_refill',`closing_meter`='$closing_meter',`diesel_out`='$desel_out',`tank_balance`='$balance',`updated_by`=' $created_by', `updated_on`=NOW() WHERE id= $edit_id") or die("");

        $description_dip_info_array = explode("||", $description_dip_info);

        $qry3=$db->query("DELETE FROM `tank_entry_detail_table` WHERE `tank_main_id` = $edit_id") or die("");
        foreach ($description_dip_info_array as $description_dip_info) {
                $description_dip_info = explode("==", $description_dip_info);
                $description = $description_dip_info[0];
                $dip = $description_dip_info[1];

               

                // $qry1 = $db->query("INSERT INTO `tank_entry_detail_table`(`tank_main_id`, `descp`, `dip`, `total_desel_out`, `total_balance`, `updated_by`, `updated_on`) VALUES ($edit_id,'$description','$dip','$desel_out','$balance',$created_by,NOW())");

                $qry1 = $db->query("INSERT INTO `tank_entry_detail_table`(`tank_main_id`, `descp`, `dip`, `total_desel_out`, `total_balance`, `created_by`, `created_on`) VALUES ($edit_id,'$description','$dip','$desel_out','$balance',$created_by,NOW())");
        }



} else if (isset($_REQUEST["txt_select_area"]) && isset($_REQUEST["txt_opening_meter"]) && isset($_REQUEST["txt_total_refill"]) && isset($_REQUEST["txt_closing_meter"]) && isset($_REQUEST["txt_desel_out"]) && isset($_REQUEST["txt_balance"]) && isset($_REQUEST["date_enter_date"])) {

        $date = $_REQUEST["date_enter_date"];
        $select_area = $_REQUEST["txt_select_area"];
        $opening_meter = $_REQUEST["txt_opening_meter"];
        $total_refill = $_REQUEST["txt_total_refill"];
        $closing_meter = $_REQUEST["txt_closing_meter"];
        $desel_out = $_REQUEST["txt_desel_out"];
        $description_dip_info = $_REQUEST["description_dip_info"];
        $balance = $_REQUEST["txt_balance"];

        $qry = $db->query("INSERT INTO `tank_entry_master`(`tank_entry_date`, `area_id`, `opening_meter`, `total_refil`, `closing_meter`, `diesel_out`, `tank_balance`,`created_on`, `updated_by`) VALUES ('$date','$select_area','$opening_meter','$total_refill','$closing_meter','$desel_out','$balance',NOW(),'$created_by')") or die("");

        $lastInsertedId = $db->lastInsertId();

        $description_dip_info_array = explode("||", $description_dip_info);

        foreach ($description_dip_info_array as $description_dip_info) {
                $description_dip_info = explode("==", $description_dip_info);
                $description = $description_dip_info[0];
                $dip = $description_dip_info[1];

                $qry1 = $db->query("INSERT INTO `tank_entry_detail_table`(`tank_main_id`, `descp`, `dip`, `total_desel_out`, `total_balance`, `created_by`, `created_on`) VALUES ($lastInsertedId,'$description','$dip','$desel_out','$balance',$created_by,NOW())");

        }


}



// deleting logic of employee master 
else if (isset($_REQUEST["del_id"])) {
        $del_id = $_REQUEST["del_id"];
        $qry = $db->query("UPDATE `tank_entry_master` SET  `updated_by`='$created_by', `updated_on`=NOW(), e_d_optn = '0' WHERE id = $del_id") or die("");

        $qry = $db->query("UPDATE `tank_entry_detail_table` SET  `updated_by`='$created_by', `updated_on`=NOW(), e_d_optn = '0' WHERE tank_main_id = $del_id") or die("");


        ?>
                                                                                                                                                                                                                                                                                                                        <script>
                                                                                                                                                                                                                                                                                                                                // alert("Tank data Deleted !....");
                                                                                                                                                                                                                                                                                                                                let message = "Tank data Deleted !....";
                                                                                                                                                                                                                                                                                                                                let color = "red";

                                                                                                                                                                                                                                                                                                                                window.location.replace("./tank_master_manage.php?message=" + message + "&color=" + color);
                                                                                                                                                                                                                                                                                                                        </script>
                                                                                                        <?php
} else if (isset($_REQUEST["start_date"]) && isset($_REQUEST["end_date"]) && isset($_REQUEST["select_employee"]) ) {
        $start_date = $_REQUEST["start_date"];
        $end_date = $_REQUEST["end_date"];
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
        if (($_REQUEST["start_date"]) != "" && ($_REQUEST["end_date"]) != "" && ($_REQUEST["select_employee"]) != "") {

                // Use the BETWEEN clause to filter records between the start and end dates
                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1' && `updated_by`= $employee && 
    STR_TO_DATE(tank_entry_date, '%Y-%m-%d') BETWEEN STR_TO_DATE('$start_date', '%Y-%m-%d') AND STR_TO_DATE('$end_date', '%Y-%m-%d')")
                        or die("");


                $total_rows = $qry->rowCount(); // Use rowCount to get the number of rows

                // Get the required number of pages
                $total_pages = ceil($total_rows / $limit);

                // Get the initial page number
                $initial_page = ($page_number - 1) * $limit;

                // Get data of selected rows per page
                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1' && `updated_by`= $employee && 
    STR_TO_DATE(tank_entry_date, '%Y-%m-%d') BETWEEN STR_TO_DATE('$start_date', '%Y-%m-%d') AND STR_TO_DATE('$end_date', '%Y-%m-%d') LIMIT $initial_page , $limit");


        }
       else if (($_REQUEST["start_date"]) != "" && ($_REQUEST["end_date"]) != "") {

                // Use the BETWEEN clause to filter records between the start and end dates
                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1' && 
    STR_TO_DATE(tank_entry_date, '%Y-%m-%d') BETWEEN STR_TO_DATE('$start_date', '%Y-%m-%d') AND STR_TO_DATE('$end_date', '%Y-%m-%d')")
                        or die("");


                $total_rows = $qry->rowCount(); // Use rowCount to get the number of rows

                // Get the required number of pages
                $total_pages = ceil($total_rows / $limit);

                // Get the initial page number
                $initial_page = ($page_number - 1) * $limit;

                // Get data of selected rows per page
                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1' && 
    STR_TO_DATE(tank_entry_date, '%Y-%m-%d') BETWEEN STR_TO_DATE('$start_date', '%Y-%m-%d') AND STR_TO_DATE('$end_date', '%Y-%m-%d') LIMIT $initial_page , $limit");


        }
        else if (($_REQUEST["start_date"]) != null && ($_REQUEST["select_employee"]) != null) {

                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1' && `updated_by`= $employee && 
    STR_TO_DATE(tank_entry_date, '%Y-%m-%d') >= STR_TO_DATE('$start_date', '%Y-%m-%d') ")
                        or die("");

                $total_rows = $qry->rowCount(); // Use rowCount to get the number of rows

                // Get the required number of pages
                $total_pages = ceil($total_rows / $limit);

                // Get the initial page number
                $initial_page = ($page_number - 1) * $limit;

                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1' && `updated_by`= $employee && 
    STR_TO_DATE(tank_entry_date, '%Y-%m-%d') >= STR_TO_DATE('$start_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");

        }  
        else if (($_REQUEST['end_date']) != null  && ($_REQUEST["select_employee"]) != null) {
                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1' && `updated_by`= $employee &&
    STR_TO_DATE(tank_entry_date, '%Y-%m-%d') <= STR_TO_DATE('$end_date', '%Y-%m-%d')")
                        or die("");

                $total_rows = $qry->rowCount(); // Use rowCount to get the number of rows

                // Get the required number of pages
                $total_pages = ceil($total_rows / $limit);

                // Get the initial page number
                $initial_page = ($page_number - 1) * $limit;

                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1' && `updated_by`= $employee &&
                STR_TO_DATE(tank_entry_date, '%Y-%m-%d') <= STR_TO_DATE('$end_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");

        }
        else if (($_REQUEST["start_date"]) != null) {

                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1' &&
    STR_TO_DATE(tank_entry_date, '%Y-%m-%d') >= STR_TO_DATE('$start_date', '%Y-%m-%d') ")
                        or die("");

                $total_rows = $qry->rowCount(); // Use rowCount to get the number of rows

                // Get the required number of pages
                $total_pages = ceil($total_rows / $limit);

                // Get the initial page number
                $initial_page = ($page_number - 1) * $limit;

                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1' &&
    STR_TO_DATE(tank_entry_date, '%Y-%m-%d') >= STR_TO_DATE('$start_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");

        } else if (($_REQUEST['end_date']) != null) {
                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1' &&
    STR_TO_DATE(tank_entry_date, '%Y-%m-%d') <= STR_TO_DATE('$end_date', '%Y-%m-%d')")
                        or die("");

                $total_rows = $qry->rowCount(); // Use rowCount to get the number of rows

                // Get the required number of pages
                $total_pages = ceil($total_rows / $limit);

                // Get the initial page number
                $initial_page = ($page_number - 1) * $limit;

                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1' &&
                STR_TO_DATE(tank_entry_date, '%Y-%m-%d') <= STR_TO_DATE('$end_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");

        }
        else if (($_REQUEST['select_employee']) != null) {
                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1' && `updated_by`= $employee")
                        or die("");

                $total_rows = $qry->rowCount(); // Use rowCount to get the number of rows

                // Get the required number of pages
                $total_pages = ceil($total_rows / $limit);

                // Get the initial page number
                $initial_page = ($page_number - 1) * $limit;

                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1'&& `updated_by`= $employee LIMIT $initial_page , $limit")
                        or die("");

        }


        ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="table-responsive-xl">
                                                                                                                                                                                                                                                                                                                                                                                                                                        <table class="table">
                                                                                                                                                                                                                                                                                                                                                                                                                                                <thead>
                                                                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">S.no</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">Date</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">Area</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">Total Refill</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">Opening Meter</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">Closing Meter</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">Desel Out</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">Description</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">DIP</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">Balance</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">Operations</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                </thead>
                                                                                                                                                                                                                                                                                                                                                                                                                                                <tbody>
                                                                                                                                                                                                                                        <?php

                                                                                                                                                                                                                                        while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
                                                                                                                                                                                                                                                $id = $row['id'];
                                                                                                                                                                                                                                                $area_id = $row['area_id'];
                                                                                                                                                                                                                                                $query = $db->query("SELECT * FROM `area_master` WHERE id='$area_id'");
                                                                                                                                                                                                                                                $rowArea = $query->fetch(PDO::FETCH_ASSOC);
                                                                                                                                                                                                                                                $area_name = $rowArea['area_name'];
                                                                                                                                                                                                                                                $query2 = "SELECT * FROM `tank_entry_detail_table` WHERE `tank_main_id`=$id AND descp!=''";
                                                                                                                                                                                                                                                $rsdescdip = $db->query($query2);

                                                                                                                                                                                                                                                $previous = $i;
                                                                                                                                                                                                                                                while ($rowdescdip = $rsdescdip->fetch(PDO::FETCH_ASSOC)) {
                                                                                                                                                                                                                                                        ?>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <th scope="row">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                <th scope="row">
                                                                                                                                                                                                                                                        <?php echo ($previous == $i) ? $i : ""; ?>
                                                                                                                                                                                                                                                                                                </th>
                                                                                                                                                                                                                                                                                                <td>
                                                                                                                                                                                                                                                        <?= ($previous == $i) ? $row['tank_entry_date'] : "" ?>
                                                                                                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                                                                                                <td>
                                                                                                                                                                                                                                                        <?= ($previous == $i) ? $area_name : "" ?>
                                                                                                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                                                                                                <td>
                                                                                                                                                                                                                                                        <?= ($previous == $i) ? $row['total_refil'] : "" ?>
                                                                                                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                                                                                                <td>
                                                                                                                                                                                                                                                        <?= ($previous == $i) ? $row['opening_meter'] : "" ?>
                                                                                                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                                                                                                <td>
                                                                                                                                                                                                                                                        <?= ($previous == $i) ? $row['closing_meter'] : "" ?>
                                                                                                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                                                                                                <td>
                                                                                                                                                                                                                                                        <?= ($previous == $i) ? $row['diesel_out'] : "" ?>
                                                                                                                                                                                                                                                                                                </td>

                                                                                                                                                                                                                                                                                                <td>
                                                                                                                                                                                                                                                        <?=
                                                                                                                                                                                                                                                                $rowdescdip['descp'];
                                                                                                                                                                                                                                                        ?>
                                                                                                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                                                                                                <td>
                                                                                                                                                                                                                                                        <?= $rowdescdip['dip'] ?>
                                                                                                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                                                                                                <td>
                                                                                                                                                                                                                                                <?= $row['tank_balance'] ?>
                                                                                                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                                               
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </td>
                                                                                                                                                                                                                                                                                       <?php $previous = $i + 1;
                                                                                                                                                                                                                                                } ?>                                                                                                                                                                                                                                         <td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="d-flex justify-content-center align-items-center"><a
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                href="tank_master_do.php?del_id=<?= $id ?>"><svg
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        height="16" fill="red" class="bi bi-trash3-fill"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        viewBox="0 0 16 16">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <path
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </svg></a> &nbsp;&nbsp;<a
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                href="tank_master.php?edit_id=<?= $id ?>"><svg
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        height="16" fill="blue" class="bi bi-pen-fill"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        viewBox="0 0 16 16">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <path
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </svg></a></div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </tr>
                                                                                                                                                                                                                                                                                                                                                <?php
                                                                                                                                                                                                                                                                                                                                                $i++;
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                        ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                </tbody>
                                                                                                                                                                                                                                                                                                                                                                                                                                        </table>
                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                            
                                                                                                                                                                                                                                                                                                                                                                                                                                        <input type="hidden" id="page_number" name="page_number" value="<?= $page_number ?>">
            
                                                                                                        <?php
} else if (isset($_REQUEST['preview'])) {
        ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <table class="table">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <thead>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">S.no</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">Date</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">Area</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">Total Refill</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">Opening Meter</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">Closing Meter</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">Desel Out</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">Description</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">DIP</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <th scope="col">Balance</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </thead>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <tbody id="details_table_body">
                                                                                                                                                                                                                                <?php

                                                                                                                                                                                                                                // $qry = $db->query("select * from `tank_entry_master` WHERE e_d_optn = '1' ORDER BY STR_TO_DATE(tank_entry_date, '%Y-%m-%d') DESC LIMIT 0,14") or die("");
                                                                                                                                                                                                                                $qry = $db->query("SELECT * FROM `tank_entry_master` WHERE e_d_optn = '1' ORDER BY STR_TO_DATE(tank_entry_date, '%Y-%m-%d') DESC, id DESC LIMIT 0, 14") or die("");


                                                                                                                                                                                                                                $i = 2;
                                                                                                                                                                                                                                while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
                                                                                                                                                                                                                                        $id = $row['id'];
                                                                                                                                                                                                                                        $area_id = $row['area_id'];
                                                                                                                                                                                                                                        $query = $db->query("SELECT * FROM `area_master` WHERE id='$area_id'");
                                                                                                                                                                                                                                        $rowArea = $query->fetch(PDO::FETCH_ASSOC);
                                                                                                                                                                                                                                        $area_name = $rowArea['area_name'];
                                                                                                                                                                                                                                        $query2 = "SELECT * FROM `tank_entry_detail_table` WHERE `tank_main_id`=$id AND descp!=''";
                                                                                                                                                                                                                                        $rsdescdip = $db->query($query2);

                                                                                                                                                                                                                                        $previous = $i;
                                                                                                                                                                                                                                        while ($rowdescdip = $rsdescdip->fetch(PDO::FETCH_ASSOC)) {

                                                                                                                                                                                                                                                ?>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <th scope="row">
                                                <?php echo ($previous == $i) ? $i : ""; ?>
                                                                              </th>
                                                                              <td>
                                                <?= ($previous == $i) ? $row['tank_entry_date'] : "" ?>
                                                                              </td>
                                                                              <td>
                                                <?= ($previous == $i) ? $area_name : "" ?>
                                                                              </td>
                                                                              <td>
                                                <?= ($previous == $i) ? $row['total_refil'] : "" ?>
                                                                              </td>
                                                                              <td>
                                                <?= ($previous == $i) ? $row['opening_meter'] : "" ?>
                                                                              </td>
                                                                              <td>
                                                <?= ($previous == $i) ? $row['closing_meter'] : "" ?>
                                                                              </td>
                                                                              <td>
                                                <?= ($previous == $i) ? $row['diesel_out'] : "" ?>
                                                                              </td>

                                                                              <td>
                                                <?=
                                                        $rowdescdip['descp'];
                                                ?>
                                                                              </td>
                                                                              <td>
                                                <?= $rowdescdip['dip'] ?>
                                                                              </td>
                                                                            <td>
                                              <?= $row['tank_balance'] ?>
                                                                            </td>
                                                                            <td>
                                                                                                                                                                                                                                                        <?php if ($i == 2) {
                                                                                                                                                                                                                                                                ?>
                                                                                                                                                                                                                                                                                                               <input type="hidden"  id="tank_balance" value="<?= $row['tank_balance'] ?>">    <?php }
                                                                                                                                                                                                                                                        $previous = $i + 1;
                                                                                                                                                                                                                                        } ?>
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