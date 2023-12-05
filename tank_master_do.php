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

        $qry3 = $db->query("DELETE FROM `tank_entry_detail_table` WHERE `tank_main_id` = $edit_id") or die("");
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
}
else if (isset($_REQUEST["txt_select_area"]))
{
        $area_id = $_REQUEST["txt_select_area"];
        $query = $db->query("SELECT * FROM `tank_entry_master` WHERE `e_d_optn` = 1 AND `area_id` = $area_id ORDER BY `created_on` DESC LIMIT 1") or die("");
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if($row){
        ?>
        <input type="hidden"  id="tank_balance" value="<?= $row['tank_balance'] ?>"> 
        
        <?php
        }
        else{
        ?>
               <input type="hidden"  id="tank_balance" value="0"> 

                <?php
        }
}
else if (isset($_REQUEST['preview'])) {
        $area = $_REQUEST['area'];
        $emp_id = $_COOKIE["emp_id"];
        $get_emp_area = $db->query("SELECT emp_area_id, emp_login_type FROM `employee_master` WHERE `id` = $emp_id") or die("");
        while ($row_emp = $get_emp_area->fetch(PDO::FETCH_ASSOC)) {
                $emp_login_type = $row_emp['emp_login_type'];
                $area_id = $row_emp["emp_area_id"];
                // $area_id_arr = explode(",", $area_id);
        }
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
                         $qry = $db->query("SELECT * FROM `tank_entry_master` WHERE e_d_optn = '1'".emp_area($emp_login_type,$area_id)." ORDER BY STR_TO_DATE(tank_entry_date, '%Y-%m-%d') DESC, id DESC LIMIT 0, 14") or die("");
                       
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
$flag = 0;
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
<?php 
if($i==2)
{
    
?>
<input type="hidden"  id="tank_opening" value="<?= $row['closing_meter'] ?>">
<?php    
}
if ($area_id==$area && $flag == 0) 
{
?><input type="hidden"  id="tank_balance" value="<?= $row['tank_balance'] ?>"> 
<?php
$flag = 1;
 }
 $previous = $i + 1;
}
  ?>
  
</tr><?php $i++;
}?>
</tbody>
</table>
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
?>