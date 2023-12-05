<?php
include("./root/dbconnection.php");
$created_by = $_COOKIE["emp_id"];

if (isset($_REQUEST["start_date"]) && isset($_REQUEST["end_date"]) && isset($_REQUEST["select_employee"])) {


        $start_date = $_REQUEST["start_date"];
        $end_date = $_REQUEST["end_date"];
        $employee = $_REQUEST["select_employee"];
        $area = $_REQUEST['select_area'];
        $emp_id = $_COOKIE["emp_id"];
        $get_emp_area = $db->query("SELECT emp_area_id, emp_login_type FROM `employee_master` WHERE `id` = $emp_id") or die("");
        while ($row_emp = $get_emp_area->fetch(PDO::FETCH_ASSOC)) {
                $emp_login_type = $row_emp['emp_login_type'];
                $area_id = $row_emp["emp_area_id"];
                // $area_id_arr = explode(",", $area_id);
        }
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
                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1'" . emp_area($emp_login_type, $area_id) . getArea($area) . "&& `updated_by`= $employee && 
STR_TO_DATE(tank_entry_date, '%Y-%m-%d') BETWEEN STR_TO_DATE('$start_date', '%Y-%m-%d') AND STR_TO_DATE('$end_date', '%Y-%m-%d')")
                        or die("");


                $total_rows = $qry->rowCount(); // Use rowCount to get the number of rows

                // Get the required number of pages
                $total_pages = ceil($total_rows / $limit);

                // Get the initial page number
                $initial_page = ($page_number - 1) * $limit;

                // Get data of selected rows per page
                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1'" . emp_area($emp_login_type, $area_id) . getArea($area) . " && `updated_by`= $employee && 
STR_TO_DATE(tank_entry_date, '%Y-%m-%d') BETWEEN STR_TO_DATE('$start_date', '%Y-%m-%d') AND STR_TO_DATE('$end_date', '%Y-%m-%d') LIMIT $initial_page , $limit");


        } else if (($_REQUEST["start_date"]) != "" && ($_REQUEST["end_date"]) != "") {

                // Use the BETWEEN clause to filter records between the start and end dates
                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1' " . emp_area($emp_login_type, $area_id) . getArea($area) . " && 
STR_TO_DATE(tank_entry_date, '%Y-%m-%d') BETWEEN STR_TO_DATE('$start_date', '%Y-%m-%d') AND STR_TO_DATE('$end_date', '%Y-%m-%d')")
                        or die("");


                $total_rows = $qry->rowCount(); // Use rowCount to get the number of rows

                // Get the required number of pages
                $total_pages = ceil($total_rows / $limit);

                // Get the initial page number
                $initial_page = ($page_number - 1) * $limit;

                // Get data of selected rows per page
                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1'" . emp_area($emp_login_type, $area_id) . getArea($area) . " && 
STR_TO_DATE(tank_entry_date, '%Y-%m-%d') BETWEEN STR_TO_DATE('$start_date', '%Y-%m-%d') AND STR_TO_DATE('$end_date', '%Y-%m-%d') LIMIT $initial_page , $limit");


        } else if (($_REQUEST["start_date"]) != null && ($_REQUEST["select_employee"]) != null) {

                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1'" . emp_area($emp_login_type, $area_id) . getArea($area) . " && `updated_by`= $employee && 
STR_TO_DATE(tank_entry_date, '%Y-%m-%d') >= STR_TO_DATE('$start_date', '%Y-%m-%d') ")
                        or die("");

                $total_rows = $qry->rowCount(); // Use rowCount to get the number of rows

                // Get the required number of pages
                $total_pages = ceil($total_rows / $limit);

                // Get the initial page number
                $initial_page = ($page_number - 1) * $limit;

                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1'" . emp_area($emp_login_type, $area_id) . getArea($area) . " && `updated_by`= $employee && 
STR_TO_DATE(tank_entry_date, '%Y-%m-%d') >= STR_TO_DATE('$start_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");

        } else if (($_REQUEST['end_date']) != null && ($_REQUEST["select_employee"]) != null) {
                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1'" . emp_area($emp_login_type, $area_id) . getArea($area) . " && `updated_by`= $employee &&
STR_TO_DATE(tank_entry_date, '%Y-%m-%d') <= STR_TO_DATE('$end_date', '%Y-%m-%d')")
                        or die("");

                $total_rows = $qry->rowCount(); // Use rowCount to get the number of rows

                // Get the required number of pages
                $total_pages = ceil($total_rows / $limit);

                // Get the initial page number
                $initial_page = ($page_number - 1) * $limit;

                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1'" . emp_area($emp_login_type, $area_id) . getArea($area) . " && `updated_by`= $employee &&
            STR_TO_DATE(tank_entry_date, '%Y-%m-%d') <= STR_TO_DATE('$end_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");

        } else if (($_REQUEST["start_date"]) != null) {

                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1'" . emp_area($emp_login_type, $area_id) . getArea($area) . " &&
STR_TO_DATE(tank_entry_date, '%Y-%m-%d') >= STR_TO_DATE('$start_date', '%Y-%m-%d') ")
                        or die("");

                $total_rows = $qry->rowCount(); // Use rowCount to get the number of rows

                // Get the required number of pages
                $total_pages = ceil($total_rows / $limit);

                // Get the initial page number
                $initial_page = ($page_number - 1) * $limit;

                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1'" . emp_area($emp_login_type, $area_id) . getArea($area) . " &&
STR_TO_DATE(tank_entry_date, '%Y-%m-%d') >= STR_TO_DATE('$start_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");

        } else if (($_REQUEST['end_date']) != null) {
                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1'" . emp_area($emp_login_type, $area_id) . getArea($area) . " &&
STR_TO_DATE(tank_entry_date, '%Y-%m-%d') <= STR_TO_DATE('$end_date', '%Y-%m-%d')")
                        or die("");

                $total_rows = $qry->rowCount(); // Use rowCount to get the number of rows

                // Get the required number of pages
                $total_pages = ceil($total_rows / $limit);

                // Get the initial page number
                $initial_page = ($page_number - 1) * $limit;

                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1'" . emp_area($emp_login_type, $area_id) . getArea($area) . " &&
            STR_TO_DATE(tank_entry_date, '%Y-%m-%d') <= STR_TO_DATE('$end_date', '%Y-%m-%d') LIMIT $initial_page , $limit")
                        or die("");

        } else if (($_REQUEST['select_employee']) != null) {
                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1'" . emp_area($emp_login_type, $area_id) . getArea($area) . " && `updated_by`= $employee")
                        or die("");

                $total_rows = $qry->rowCount(); // Use rowCount to get the number of rows

                // Get the required number of pages
                $total_pages = ceil($total_rows / $limit);

                // Get the initial page number
                $initial_page = ($page_number - 1) * $limit;

                $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1'" . emp_area($emp_login_type, $area_id) . getArea($area) . " && `updated_by`= $employee LIMIT $initial_page , $limit")
                        or die("");

        }
        else if($area!=0)
        {
                 // Use the BETWEEN clause to filter records between the start and end dates
                 $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1'" . emp_area($emp_login_type, $area_id) . " AND `area_id`=$area ")
                                         or die("");
                 
                 
                                 $total_rows = $qry->rowCount(); // Use rowCount to get the number of rows
                 
                                 // Get the required number of pages
                                 $total_pages = ceil($total_rows / $limit);
                 
                                 // Get the initial page number
                                 $initial_page = ($page_number - 1) * $limit;
                 
                                 // Get data of selected rows per page
                                 $qry = $db->query("SELECT * FROM tank_entry_master WHERE e_d_optn = '1'" . emp_area($emp_login_type, $area_id) ."AND `area_id`=$area ORDER BY `id` DESC LIMIT $initial_page , $limit");
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
}


function emp_area($emp_login_type,$area_id)
{
        if($emp_login_type == 0)
        { 
            return " AND area_id IN ('$area_id')";
        } else {
            return ""; // Return an empty string if $emp_login_type is not 0
        }
}

function getArea($area_id)
{
        if($area_id==0)
        {
                return "";
        }
        else
        {
             return " AND `area_id`=$area_id";   
        }
        
}
?>