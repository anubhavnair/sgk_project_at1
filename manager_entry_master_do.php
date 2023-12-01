<?php
include("./root/dbconnection.php");


// manager entry master  insert and update logic here if isset($_REQUEST["edit_id"]) then it will perform update query elseif perform insert querry 
if (isset($_REQUEST["edit_id"])) {
    $updated_by = $_COOKIE["emp_id"];
    $edit_id = $_REQUEST["edit_id"];
    $dt_date = $_REQUEST["dt_date"];
    $slip_number = $_REQUEST["text_slip_number"];
    $vehical_number = $_REQUEST["text_vehical_number"];
    $qty = $_REQUEST["text_quantity"];

    if (isset($_FILES['img_upload_slip']) && $_FILES['img_upload_slip']['error'] == UPLOAD_ERR_OK) {

        $delete_image = $db->query("SELECT  `slip_image` FROM `manager_entry_master` WHERE id = $edit_id") or die("");

        $delete_image_name = $delete_image->fetch(PDO::FETCH_ASSOC);
        $slipImageName = $delete_image_name['slip_image'];
        $filePath = "images/slips/$slipImageName";

        if (file_exists($filePath)) {
            if (unlink($filePath)) {
              
            } 
        } 



        $name = $_FILES['img_upload_slip']['name'];
        $filetype = $_FILES['img_upload_slip']['type'];

        list($txt, $ext) = explode(".", $name);
        $image_name = $txt . "-" . time() . "." . $ext;

        $path = "images/slips/" . $image_name;
        move_uploaded_file($_FILES["img_upload_slip"]["tmp_name"], $path);

        $qry = $db->query("UPDATE `manager_entry_master` SET `select_date`='$dt_date',`slip_no`='$slip_number',`vehical_no`='$vehical_number',`total_qty`='$qty',`slip_image`='$image_name',`updated_by` = '$updated_by', `updated_on` = NOW() WHERE id = $edit_id") or die("");
    } else {
        $qry = $db->query("UPDATE `manager_entry_master` SET `select_date`='$dt_date',`slip_no`='$slip_number',`vehical_no`='$vehical_number',`total_qty`='$qty',`updated_by` = '$updated_by', `updated_on` = NOW() WHERE id = $edit_id") or die("");
    }



} else if (isset($_REQUEST["dt_date"]) && isset($_REQUEST["text_slip_number"]) && isset($_REQUEST["text_vehical_number"]) && isset($_REQUEST["text_quantity"])) {
    $created_by = $_COOKIE["emp_id"];
    $dt_date = $_REQUEST["dt_date"];
    $slip_number = $_REQUEST["text_slip_number"];
    $vehical_number = $_REQUEST["text_vehical_number"];
    $qty = $_REQUEST["text_quantity"];

    $name = $_FILES['img_upload_slip']['name'];
    $filetype = $_FILES['img_upload_slip']['type'];

    list($txt, $ext) = explode(".", $name);
    $image_name = $txt . "-" . time() . "." . $ext;

    $path = "images/slips/" . $image_name;
    move_uploaded_file($_FILES["img_upload_slip"]["tmp_name"], $path);

    $qry = $db->query("INSERT INTO `manager_entry_master`(`select_date`, `slip_no`, `vehical_no`, `total_qty`,`slip_image`,`created_by`,`created_on`) VALUES ('$dt_date','$slip_number','$vehical_number','$qty','$image_name','$created_by',NOW())");

}



// deleting logic of employee master 

if (isset($_REQUEST["del_id"])) {
    $updated_by = $_COOKIE["emp_id"];
    $del_id = $_REQUEST["del_id"];
    $qry = $db->query("UPDATE `manager_entry_master` set e_d_optn = 0 ,updated_by = $updated_by, updated_on = NOW() WHERE id = $del_id") or die("");


    ?>
    <script>

        window.location.replace("./manager_entry_master_manage.php?res=3");
    </script>
    <?php
}
?>

<!-- filter by data  -->

<?php
if (isset($_REQUEST["filter_by_date"])) {
    $filter_by_date = $_REQUEST["filter_by_date"];

    $qry = $db->query("SELECT * FROM manager_entry_master WHERE select_date = '$filter_by_date' and e_d_optn = 1") or die("");

    ?>


    <table class="table text-center ">
        <thead>
            <tr>
                <th scope="col">SNO</th>
                <th scope="col">Date</th>
                <th scope="col">Slip Number</th>
                <th scope="col">Vehical Number</th>
                <th scope="col">Quantity</th>
                <th scope="col">status</th>

            </tr>
        </thead>
        <tbody>


            <?php
            $i = 1;
            while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <th scope="row">
                        <?php echo $i; ?>
                    </th>
                    <td>
                        <?php echo $row["select_date"]; ?>
                    </td>
                    <td>
                        <?php echo $row["slip_no"]; ?>
                    </td>
                    <td>
                        <?php echo $row["vehical_no"]; ?>
                    </td>
                    <td>
                        <?php echo $row["total_qty"]; ?>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center "><a
                                href="manager_entry_master_do.php?del_id=<?php echo $row['id'] ?>"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"
                                    class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                </svg></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                                href="manager_entry_master.php?edit_id=<?php echo $row['id']; ?>"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-pen-fill"
                                    viewBox="0 0 16 16">
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





        </tbody>
    </table>




    <?php




}

?>