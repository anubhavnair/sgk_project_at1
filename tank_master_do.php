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




} else if (isset($_REQUEST["txt_select_area"]) && isset($_REQUEST["txt_opening_meter"]) && isset($_REQUEST["txt_total_refill"]) && isset($_REQUEST["txt_closing_meter"]) && isset($_REQUEST["txt_desel_out"]) && isset($_REQUEST["txt_banance"]) && isset($_REQUEST["txt_description"]) && isset($_REQUEST["txt_enter_date"])) {

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
                // alert("Tank data Deleted !....");
                let message = "Tank data Deleted !....";
                let color = "red";

                window.location.replace("./tank_master_manage.php?message=" + message+"&color="+color);
            </script>
    <?php
} else if (isset($_REQUEST["start_date"]) && isset($_REQUEST["end_date"])) {
    $start_date = $_REQUEST["start_date"];
    $end_date = $_REQUEST["end_date"];

    if (($_REQUEST["start_date"]) != "" && ($_REQUEST["end_date"]) != "") {

        // Use the BETWEEN clause to filter records between the start and end dates
        $qry = $db->query("SELECT * FROM tank_entry_master WHERE 
    STR_TO_DATE(tank_entry_date, '%Y-%m-%d') BETWEEN STR_TO_DATE('$start_date', '%Y-%m-%d') AND STR_TO_DATE('$end_date', '%Y-%m-%d')")
            or die("");
    } else if (($_REQUEST["start_date"]) != null) {

        $qry = $db->query("SELECT * FROM tank_entry_master WHERE 
    STR_TO_DATE(tank_entry_date, '%Y-%m-%d') >= STR_TO_DATE('$start_date', '%Y-%m-%d')")
            or die("");
    } else if (($_REQUEST['end_date']) != null) {
        $qry = $db->query("SELECT * FROM tank_entry_master WHERE 
    STR_TO_DATE(tank_entry_date, '%Y-%m-%d') <= STR_TO_DATE('$end_date', '%Y-%m-%d')")
            or die("");
        ;
    }
    $i = 1;
    while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id'];
        $area_id = $row['area_id'];
        $query = $db->query("SELECT * FROM `area_master` WHERE id='$area_id'");
        $rowArea = $query->fetch(PDO::FETCH_ASSOC);
        $area_name = $rowArea['area_name'];

        ?>

                    <tr>
                        <th scope="row">
                <?php echo $i; ?>
                        </th>
                        <td>
                <?= $row['tank_entry_date'] ?>
                        </td>
                        <td>
                <?= $area_name ?>
                        </td>
                        <td>
                <?= $row['total_refil'] ?>
                        </td>
                        <td>
                <?= $row['opening_meter'] ?>
                        </td>
                        <td>
                <?= $row['closing_meter'] ?>
                        </td>
                        <td>
                <?= $row['diesel_out'] ?>
                        </td>
                        <td>
                <?= $row['tankentry_description'] ?>
                        </td>
                        <td>
                <?= $row['tank_dip'] ?>
                        </td>
                        <td>
                <?= $row['tank_balance'] ?>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center"><a
                                    href="tank_master_do.php?del_id=<?= $id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg></a> &nbsp;&nbsp;<a href="tank_master.php?edit_id=<?= $id ?>"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-pen-fill"
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

    <?php
}
?>